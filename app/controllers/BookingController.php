<?php

class BookingController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		return View::make('layouts.home');
	}

	public function postPrebook()
	{


		$data = Input::All();
		
		$rules 		= array('checkin'=>'required','checkout'=>'required');

		$amount_guest = @$data['amount_guest'];

		Session::put('amount_guest',$amount_guest);
		
		$validator = Validator::make($data, $rules);
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}else{

			$allotment 		= AuthBackend::listAllotmentbyroomtype($data);
			
			$allot_from = \DateTime::createFromFormat('d/m/Y', $data['checkin'])->format('l d M Y');
	        $allot_to = \DateTime::createFromFormat('d/m/Y', $data['checkout'])->format('l d M Y');

	        $begin = new \DateTime($allot_from);
	        $end = new \DateTime($allot_to);

	        $interval = date_diff($begin, $end);
			$amount_nights = $interval->format('%a '.Lang::get('front.night').'');

			$encrypted = \Crypt::encrypt($data);


			if(isset($data['nickdebug'])){
				print_r($data);
				print_r($allotment);
			}

			return View::make('layouts.prebook')->with('checkin',$data['checkin'])
												->with('checkout',$data['checkout'])
												->with('allot_from',$allot_from)
												->with('allot_to',$allot_to)
												->with('amount_nights',$amount_nights)
												->with('link_booking',$encrypted)
												->with('allotments',$allotment)
												->with('amount_guest',$amount_guest);
		}
		
	}

	public function getBookinfo()
	{ 
		$data = Input::All();

		$decrypt = \Crypt::decrypt($data['bprm']);


		$allot_from = \DateTime::createFromFormat('d/m/Y', $decrypt['checkin'])->format('l d M Y');
        $allot_to = \DateTime::createFromFormat('d/m/Y', $decrypt['checkout'])->format('l d M Y');


        $begin = new \DateTime($allot_from);
        $end = new \DateTime($allot_to);

        $interval = date_diff($begin, $end);
		$amount_nights = $interval->format('%a');

		# roomtype
		$roomtype 		= AuthBackend::getRoomtype($data['rtif']);
		$json_roomtype 	= json_encode($roomtype);
		$roomtype_arr	= json_decode($json_roomtype,1);
		
		Session::put('decrypt',$decrypt);
		Session::put('allot_from',$allot_from);
		Session::put('allot_to',$allot_to);
		Session::put('roomtypes',$roomtype_arr);
		Session::put('amount_nights',$amount_nights);
		Session::put('amount_rooms',$data['roomno']);
		

		return View::make('layouts.bookinfo')->with('checkin',$decrypt['checkin'])
											->with('checkout',$decrypt['checkout'])
											->with('allot_from',$allot_from)
											->with('allot_to',$allot_to)
											->with('amount_rooms',$data['roomno'])
											->with('roomtypes',$roomtype_arr)
											->with('amount_nights',$amount_nights);

		
	}

	public function getPrebook()
	{  	
		$data = Input::All();

		$rules 		= array('checkin'=>'required','checkout'=>'required');

		$amount_guest = @$data['amount_guest'];
		
		$validator = Validator::make($data, $rules);
		if ($validator->fails())
		{	$messages = $validator->messages();

			return View::make('layouts.prebook')->with('errors',$messages)
												->with('amount_guest',$amount_guest);
		}else{

			$allotment 		= AuthBackend::listAllotmentbyroomtype($data);
		
			return View::make('layouts.prebook')->with('allotments',$allotment);
		}
		
	}

	public function postBookinfo()
	{
		$data = Input::All();
		$captcha_value = Session::get('captcha');


			$email_regx			= array('required','between:3,64','regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/');

			$confirmed_email_regx			= array('required','same:email','between:3,64','regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/');
			
			
			$rules         = array( 'firstname'=>'required|between:2,64|alpha',
									'lastname'=>'required|between:2,64|alpha',
									'email'=>$email_regx,
									'email_confirmation'=>$confirmed_email_regx,
									'mobile'=>array('required', 'digits:10','min:9','regex:/^(08([0-9]{8})|09([0-9]{8}))$/'),
									'captcha'=>'required|max:5'
									);

            $validator 	= Validator::make($data, $rules);

            if ($validator->fails())
            {	
               return Redirect::back()->withErrors($validator)->withInput();

            }else{

					if($captcha_value==$data['captcha']){
						// Correct booking success

						$ses = Session::All();

						$decrypt 		= $ses['decrypt'];
						$amount_nights	= $ses['amount_nights'];
						$amount_rooms	= $ses['amount_rooms'];
						$roomtypes		= $ses['roomtypes'];

						$data['checkin'] = $decrypt['checkin'];
						$data['checkout'] = $decrypt['checkout'];
						$data['amount_nights']= $amount_nights;
						$data['amount_rooms']= $amount_rooms;
						$data['roomtype_id']= $roomtypes['id'];

						$totalprice = $roomtypes['roomtype_price']*$amount_rooms*$amount_nights;

						$data['booking_price'] = $totalprice;

						$booking_res = AuthBackend::addBooking($data);

						if(!empty($booking_res['id'])){
							
							$booking_res['amount_guest'] = Session::get('amount_guest');

							Session::put('booking_detail',$booking_res);

							$breakfast = "Excluded";
							if($roomtypes['include_breakfast']){
								$breakfast = "Included";
							}

							$params = array(
									'fullname' =>$data['firstname'].' '.$data['lastname'],
									'booking_number'=>$booking_res['bookingnumber'],
									'checkin'=>$data['checkin'],
									'checkout'=>$data['checkout'],
									'amount_rooms'=>$amount_rooms,
									'breakfast'=>$breakfast,
									'roomtype'=>$roomtypes['roomtype_name'],
									'amount_guest'=>$booking_res['amount_guest'],
									'customer_email'=>$data['email']
											);

							AuthBackend::sendmailBooking($params);

							return Redirect::to('/booking/completed?'.http_build_query(Request::query()));

						}else{
							// incorrect booking failed
							$error_message = Lang::get('front.error_booking');
                        	return Redirect::back()->with('book_failed',$error_message)->withInput();
						}


					}else{
						$error_message = Lang::get('front.error_captcha');
                        return Redirect::back()->with('book_failed',$error_message)->withInput();
					}

			}	
		
		

		return View::make('layouts.home');
		
	}

	public function getCompleted(){

		$booking_detail = Session::get('booking_detail');

		$roomtype_id 	= $booking_detail['roomtype_id'];

		$roomtype 		= AuthBackend::getRoomtype($roomtype_id);
		$json_roomtype 	= json_encode($roomtype);
		$roomtype_arr	= json_decode($json_roomtype,1);

		unset($booking_detail['roomtype_id']);
		//print_r($booking_detail);
		//$ss=Session::All();

		//print_r($ss);
		//exit;
		//$booking_detail['roomtypes']=$roomtype_arr;
		
		return View::make('layouts.bookcompleted')->with('booking_detail',$booking_detail)
												  ->with('roomtypes',$roomtype_arr);
		
	}

	public function getCaptcha(){

            $captcha = new Gregwar\Captcha\CaptchaBuilder();

            $captcha->setBackgroundColor(252,252,252);//#fcfcfc
            
            $captcha->build(200,50);

            Session::put('captcha',$captcha->getPhrase());

            header('Content-type: image/jpeg');

            echo $captcha->output();

        }

}

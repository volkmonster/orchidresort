<?php

class BackofficeController extends BaseController {

	public function getLogout()
	{	
		AuthBackend::logout();
		return Redirect::to('/');
	}

	public function getIndex()
	{	
		
		return View::make('backoffice.dashboard');
	}

	public function getUpdateprintstatus($id){
		if(empty($id)){
			return "0";
		}else{
			$print_confirm 			= AuthBackend::confirmPrinting($id);
			$json_print_confirm 	= json_encode($print_confirm);
			$confirm				= json_decode($json_print_confirm,1);
			return $confirm;
		}
	}

	public function getConfirmbooking($id=""){
		
		if(empty($id)){
			return "0";
		}else{

			/*  
			  - confirm check-in by
              - update payment status
              - update booking status
              - update acknowledgement
            */

          $userid = @Session::get('userid');
          $fullname = @Session::get('user');
          $param  = array('account_id' => $userid,'id'=>$id, 'account_fullname'=>$fullname);

			$bookingconfirm 		= AuthBackend::confirmBooking($param);
			$json_bookingconfirm 	= json_encode($bookingconfirm);
			$confirm				= json_decode($json_bookingconfirm,1);
			return $confirm;
		}
	}

	public function getCheckin($id="")
	{	
		if(empty($id)){
			return View::make('backoffice.checkin');
		}else{
			$bookinginfo 		= AuthBackend::getBooking($id);
			$json_bookinginfo 	= json_encode($bookinginfo);
			$booking_detail		= json_decode($json_bookinginfo,1);


			$roomtype 		= AuthBackend::getRoomtype($booking_detail[0]['roomtype_id']);
			$json_roomtype 	= json_encode($roomtype);
			$roomtype_arr	= json_decode($json_roomtype,1);

			unset($booking_detail[0]['roomtype_id']);

			return View::make('backoffice.checkin_detail')->with('booking_detail',$booking_detail[0])
												          ->with('roomtypes',$roomtype_arr);
		}

	}

	public function getReportbookings()
	{	
		
		return View::make('backoffice.reportbookings');
		
	}

	public function getSettingroom()
	{	
			$roomtype 		= AuthBackend::listRoomtype();
			$json_roomtype 	= json_encode($roomtype);
			$roomtype_arr	= json_decode($json_roomtype,1);
			return View::make('backoffice.settingroom')->with('roomtypes',$roomtype_arr);
	}

	public function getSettingroomtype($id="")
	{	

		if(!empty($id)){
			$roomtype 		= AuthBackend::getRoomtype($id);
			$json_roomtype 	= json_encode($roomtype);
			$roomtype_arr	= json_decode($json_roomtype,1);

			return View::make('backoffice.settingroomtypeid')->with('roomtypes',$roomtype_arr);
		}else{
			$roomtype 		= AuthBackend::listRoomtype();
			$json_roomtype 	= json_encode($roomtype);
			$roomtype_arr	= json_decode($json_roomtype,1);
			return View::make('backoffice.settingroomtype')->with('roomtypes',$roomtype_arr);
		}
	}

	public function postSettingroomtypeupdate(){

		$data = Input::All();

		// print_r($data);

		// exit;
		
		$update_status = AuthBackend::updateRoomtype($data);
		
		$roomtype 		= AuthBackend::getRoomtype($data['roomtype_id']);
		$json_roomtype 	= json_encode($roomtype);
		$roomtype_arr	= json_decode($json_roomtype,1);

		return View::make('backoffice.settingroomtypeid')->with('update_status',$update_status)
														 ->with('roomtypes',$roomtype_arr);

            
    }

	public function getSettingaddroomtype()
	{
		return View::make('backoffice.settingaddroomtype');
	}

	public function postSettingaddroomtype(){

		$data = Input::All();

		return AuthBackend::addRoomtype($data);

	}

	public function getSettingpassword(){

		return View::make('backoffice.changepassword');

	}

	public function postSettingpassword(){

		$data = Input::All();

		$rules 		= array('old_pwd'=>'required','new_pwd'=>'required');
		
		$validator = Validator::make($data, $rules);
		
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}else{
			$response = AuthBackend::updatepassword($data);

			print_r($response);
			exit;

			return View::make('backoffice.changepassword');
		}

	}

	public function getAllotmentroommanagement(){

		$roomtype 		= AuthBackend::listRoomtype();
		$json_roomtype 	= json_encode($roomtype);
		$roomtype_arr	= json_decode($json_roomtype,1);

		return View::make('backoffice.allotmentroommanage')->with('roomtypes',$roomtype_arr);
	}

	public function getAllotmentpricesmanagement(){

		$roomtype 		= AuthBackend::listRoomtype();
		$json_roomtype 	= json_encode($roomtype);
		$roomtype_arr	= json_decode($json_roomtype,1);

		return View::make('backoffice.allotmentpricesmanage')->with('roomtypes',$roomtype_arr);
	}

	public function getSearchbooking(){
		$data = Input::All();

		return AuthBackend::searchBooking($data);
	}

	public function getDataallotment(){
		
		$data = Input::All();

		return AuthBackend::getAllotment($data);

	}

	public function getDataallotmentprices(){
		
		$data = Input::All();

		return AuthBackend::getAllotmentPrices($data);

	}

	public function getDatabooking(){
		$data = Input::All();

		$x = AuthBackend::getBookings($data);

		return $x;
	}

	public function getUpdateallotment(){
		$data = Input::All();

		// Must be validataion before this below
		$data['id'] = str_replace('amount_allot_', '', $data['name']); 
		$data['allotment_quata'] = $data['newvalue'];

		return AuthBackend::updateAllotment($data);
	}

	public function getSettingtax()
	{	
		return View::make('backoffice.reportbookings');
	}
	
	

}

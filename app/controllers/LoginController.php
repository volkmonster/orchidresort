<?php

class LoginController extends BaseController {

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
        $data = Input::All();
        
        $error = Session::get('error');
        if(AuthBackend::user()){
            return Redirect::to('backoffice/checkin');
        }else{		
            return View::make('layouts.login')->with('error', $error);
        }
	}

	public function postIndex()
	{	
			$data 	= Input::all();
            $rules 	= array();
            
            //Email pattern
            $data['account'] = strtolower($data['account']);

            $rules  = array(
                        'account'           => array('required','alpha'),
                        'password'          => array('required')
                        );
            $validator = Validator::make($data, $rules);
            if ($validator->fails())
            {
                return Redirect::back()->withErrors($validator)->withInput();
            }else{
                
                $user_json = AuthBackend::login($data);
                $userdata  = json_decode($user_json,1);
                
                if(isset($userdata['username'])){
                    return Redirect::to('backoffice/checkin');
                }else{
                    
                    $errorMessage = $userdata['error'];
                    return Redirect::back()->with('error',$errorMessage);
                }
            }
	}

}

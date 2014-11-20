<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	// check language
	$query_array = $request->query->all();

            if(isset($query_array['lang'])){		

                $minutes = (60*24*365); // 525600 as 1 year

                switch ($query_array['lang']) {
                    case 'th':
                        # code...
                        Session::put('locale', $query_array['lang']);
                        App::setLocale($query_array['lang']);
                        break;
                     case 'en':
                        # code...
                        Session::put('locale', $query_array['lang']);
                        App::setLocale($query_array['lang']);
                        break;
                    
                    default:
                        # code...
                        Session::put('locale', $query_array['lang']);
                        App::setLocale('en');
                        break;
                }
                
            }else{

                if(Session::get('locale')){
                    App::setLocale(Session::get('locale'));
                }else{
                    Session::put('locale','th');
                    App::setLocale('th');

                }
            }
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			//return Redirect::to('backoffice/login');
            return Redirect::guest('login');
		}
	}
});


Route::filter('auth.basic', function()
{
	//return Auth::basic();
    Config::set('session.driver','array');
    
});

Route::filter('auth.local', function()
{
     if(AuthBackend::guest()){
        return Redirect::to('login');
     }
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

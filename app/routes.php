<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return View::make('hello');
// });

// Route::Controller('/member/login','MemberLoginController');
// Route::Controller('/member/register','MemberRegisterController');
// Route::Controller('/member/recovery','MemberPasswordController');
// Route::Controller('/connect/ping','ConnectController');

Route::group(array('prefix' => 'backoffice',
					'before'=>'auth.local'
					), function(){
              Route::Controller('/','BackofficeController');
});

// Route::filter('auth.basic', function()
// {
//     Config::set('session.driver', 'array');
//     return Auth::onceBasic();
// });

// Route::group(array('before'=>'auth.basic','domain' => 'backoffice.orchidresort.com'), function()
// {
// 	Route::Controller('/','BackofficeController');

// });

Route::Controller('/login','LoginController'); // login

Route::Controller('/contact','ContactController'); // contact
Route::Controller('/booking','BookingController'); // booking
Route::Controller('/gallery','GalleryController'); // gallery
Route::Controller('/accomodation','AccomodationController'); // accomudation
Route::Controller('/','HomeController'); // Welcome

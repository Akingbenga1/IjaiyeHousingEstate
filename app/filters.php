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
	//

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

	if(Request::header("appId") == "MYAPP_ID_HERE" and Auth::guest())
		{
			  
			   $response = array('msg' => 'You are not logged in.', 
			   					 'status' => 900, 'AuthStatus' => ['You are not logged in. You are now redirected to the login page'] );
			
			   return Response::json($response);
		}
	if (Auth::guest()) return Redirect::guest(URL::route('login-form'));
});



Route::filter('auth.basic', function()
{
	return Auth::basic('useremail');
});


Route::filter('admin', function()
{
     $user = Auth::user();

    if (!$user->ability(array('Super User', 'Administrator', 'SchoolAdministrator','Principal', 'Vice Principal','Secretary'), array())  )
    {
        return Redirect::to(URL::route('login-form'));
    }
});


Route::filter('generalteacher', function()
{
	     $user = Auth::user();

    if ( $user->ability(array('Teacher'), array()) or  $user->ability(array('Super User', 'Administrator', 'Principal', 'Vice Principal','Secretary'), array())  )
    {
    	
       
    }
    else
    {
    		return Redirect::to(URL::route('login-form'));
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
	if(Request::header("appId") == "MYAPP_ID_HERE" and Auth::check())
			{
				  
			   $response = array('msg' => 'You are already logged in.', 
			   					  'status' => 800, 
			   					  'AuthStatus' => ['You are already logged in. You are now redirected to the dashboard']
			   					 );
			   return Response::json($response);
			}
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

/*Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});*/

Route::filter('csrf', function()

{
	if(Request::header("appId") == "MYAPP_ID_HERE" )
			{
				  
			  /* $response = array('msg' => 'You are already logged in.', 
			   					  'status' => 800, 
			   					  'AuthStatus' => ['You are already logged in. You are now redirected to the dashboard']
			   					 );
			   return Response::json($response);*/
			
			}
			else
			{
				$token = Request::ajax() ? Request::header('X-CSRF-Token') : Input::get('_token');
  				if (Session::token() != $token) {
      												throw new Illuminate\Session\TokenMismatchException;
												}
   
   			}
});
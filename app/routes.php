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

Route::model('user', 'User');
Route::model('pin', 'Pin');

// User Area
Route::group(array('prefix' => 'user', 'before' => 'auth'), function()
{
    # User Dashboard
    Route::get('dashboard.php', function()
	{
		return View::make('site/user/page/dashboard');
	});

    Route::get('pin/index.php', 'UserPinController@getIndex');

    Route::get('pin/create.php', 'UserPinController@getCreate');
    Route::post('pin/create.php', 'UserPinController@postCreate'); 

    Route::get('pin/{pin}/edit.php', 'UserPinController@getEdit')
        ->where('pin', '[0-9]+');    
    Route::post('pin/{pin}/edit.php', 'UserPinController@postEdit')
        ->where('pin', '[0-9]+');  

    Route::get('pin/{pin}/delete.php', 'UserPinController@getDelete')
        ->where('pin', '[0-9]+');    
    Route::post('pin/{pin}/delete.php', 'UserPinController@postDelete')
        ->where('pin', '[0-9]+');                     
});

Route::get('register.php', function()
{
	return View::make('site/user/register');
});

Route::get('login.php', function()
{
	return View::make('site/user/login');
});	

Route::post('login.php', 'UserController@postLogin');
Route::get('logout.php', 'UserController@getLogout');	


// Pin Area
Route::get('pin/{PinSlug}', 'PinController@getView')
	->where('PinSlug', '^.*\.(html)');

Route::get('facebook/auth', 'FacebookController@getAuth');

Route::get('/', 'HomeController@getIndex');	

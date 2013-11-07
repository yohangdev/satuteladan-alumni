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
    Route::get('dashboard', function()
	{
		return View::make('site/user/page/dashboard');
	});

    Route::group(array('prefix' => 'pin'), function()
    {
        Route::get('/', 'UserPinController@getIndex');

        Route::get('create', 'UserPinController@getCreate');
        Route::post('pin/create', 'UserPinController@postCreate');

        Route::get('{pin}/edit', 'UserPinController@getEdit')
            ->where('pin', '[0-9]+');
        Route::post('{pin}/edit', 'UserPinController@postEdit')
            ->where('pin', '[0-9]+');

        Route::get('{pin}/delete', 'UserPinController@getDelete')
            ->where('pin', '[0-9]+');
        Route::post('{pin}/delete', 'UserPinController@postDelete')
            ->where('pin', '[0-9]+');
    });
});


// Pin Area
Route::group(array('prefix' => 'pin'), function()
{
    Route::get('{PinSlug}', 'PinController@getView')
        ->where('PinSlug', '^.*\.(html)');
});

Route::get('register', function()
{
	return View::make('site/user/register');
});

Route::get('login', function()
{
	return View::make('site/user/login');
});

Route::post('login', 'UserController@postLogin');
Route::get('logout', 'UserController@getLogout');


Route::get('facebook/auth', 'FacebookController@getAuth');

Route::get('/', 'HomeController@getIndex');

<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::group(['middleware' => 'jwt.auth'], function(){
    Route::post('user/logout', 'AuthController@logout');
    Route::get('/user' ,  function(Request $request) {
        return auth()->user()->only('id' , 'name' , 'email' , 'phone' , 'is_admin');
    });

    });

Route::post('user/register', 'APIRegisterController@register');
Route::post('user/login', 'APILoginController@login');

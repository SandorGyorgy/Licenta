<?php
use App\User;
use App\Post;
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
        return auth()->user()->only('id' , 'name' , 'email' , 'phone' , 'profile_picture');
    });
   
    Route::post('/user/post' , 'PostController@store');
    Route::get('/user/posts' , 'PostController@UserPosts');
    Route::post('/post/delete' , 'PostController@destroy');
    Route::post('/post/edit' , 'PostController@edit');
    Route::post('/create/message' , 'MessagesController@store');
    Route::get('/contacts' , 'MessagesController@contacts');
    Route::get('/get/messages/{id}' , 'MessagesController@conversation');


    });
Route::post('user/register', 'APIRegisterController@register');
Route::post('user/login', 'APILoginController@login');
Route::get('/posts' ,'PostController@index');
Route::get('/view/post/{id}' , 'PostController@show');
Route::get('/mostpopular' , 'PostController@topPlaces');



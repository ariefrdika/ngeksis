<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
  'uses' => 'AuthController@index',
  'as' => 'login'
]);

Route::get('/register', [
  'uses' => 'AuthController@register',
  'as' => 'register'
]);

Route::post('/register/proses', [
  'uses' => 'UserController@user_register',
  'as' => 'user_register'
]);

Route::post('/login', [
  'uses' => 'AuthController@login',
  'as' => 'loginProcess'
]);

Route::get('/logout', [
  'uses' => 'AuthController@logout',
  'as' => 'logout'
]);

//buat checkRole
Route::group(['middleware' => ['auth']],function(){
  Route::get('/homepage', [
    'uses' => 'PostController@index',
    'as' => 'homepage'
  ]);
  Route::post('/homepage/posting/process', [
    'uses' => 'PostController@add',
    'as' => 'postadd'
  ]);
  Route::get('/homepage/postingan-saya', [
    'uses' => 'PostController@index_me',
    'as' => 'homepage_me'
  ]);
  Route::get('/homepage/posting/like/{idnya}', [
    'uses' => 'LikeController@add',
    'as' => 'like'
  ]);
  Route::post('/homepage/posting/comments/{idnya}', [
    'uses' => 'KomentController@add',
    'as' => 'koment'
  ]);
  Route::get('/friends', [
    'uses' => 'UserController@friends',
    'as' => 'friends'
  ]);
  Route::get('/friends/{username}/add', [
    'uses' => 'UserController@addfriend',
    'as' => 'addfriend'
  ]);
  Route::get('/friends/{username}/acc', [
    'uses' => 'UserController@accfriend',
    'as' => 'accfriend'
  ]);
  Route::get('/friends/{username}/unfriends', [
    'uses' => 'UserController@unfriends',
    'as' => 'unfriends'
  ]);
});

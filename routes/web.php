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

Route::get('/',[
    'uses'=>'AuthController@getWelcome',
    'as'=>'/'
]);
Route::get('/login',[
    'uses'=>'AuthController@getWelcome',
    'as'=>'login'
]);
Route::post('/login',[
    'uses'=>'AuthController@postLogin',
    'as'=>'login'
]);

Route::group(['middleware'=>'auth','prefix'=>'admin'], function (){

    Route::get('/dashboard',[
        'uses'=>'AdminController@getDashboard',
        'as'=>'dashboard'
    ]);

    Route::get('/logout',[
        'uses'=>'AuthController@getLogout',
        'as'=>'logout'
    ]);
});


Route::group(['prefix'=>'admin','middleware'=>'role:Admin'], function (){

   Route::get('/users',[
       'uses'=>'AdminController@getUsers',
       'as'=>'users'
   ]);
   Route::get('/user/new',[
       'uses'=>'AdminController@getNewUser',
       'as'=>'user.new'
   ]);
   Route::post('/user/new',[
       'uses'=>'AdminController@postNewUser',
       'as'=>'user.new'
   ]);
   Route::get('/user/{id}/edit',[
       'uses'=>'AdminController@getEditUser',
       'as'=>'user.edit'
   ]);
   Route::post('/user/update',[
       'uses'=>'AdminController@postUpdateUser',
       'as'=>'user.update'
   ]);
   Route::post('/user/remove',[
       'uses'=>'AdminController@postRemoveUser',
       'as'=>'user.remove'
   ]);
});
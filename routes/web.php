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
    Route::get('/profile',[
        'uses'=>'AdminController@getProfile',
        'as'=>'profile'
    ]);
    Route::post('/update/password',[
        'uses'=>'AdminController@postUpdatePassword',
        'as'=>'update.password'
    ]);
    Route::get('/dashboard',[
        'uses'=>'AdminController@getDashboard',
        'as'=>'dashboard'
    ]);

    Route::get('/logout',[
        'uses'=>'AuthController@getLogout',
        'as'=>'logout'
    ]);
});

Route::group(['prefix'=>'ktv', 'middleware'=>'role:Administrator|Manager'], function (){
    Route::get('/room/new',[
        'uses'=>'KtvRoomController@getNewRoom',
        'as'=>'ktv.room.new'
    ]);
    Route::post('/room/new',[
        'uses'=>'KtvRoomController@postNewRoom',
        'as'=>'ktv.room.new'
    ]);
    Route::get('/room/all',[
        'uses'=>'KtvRoomController@getAllRoom',
        'as'=>'ktv.room.all'
    ]);
    Route::post('/room/remove',[
        'uses'=>'KtvRoomController@postRemoveRoom',
        'as'=>'ktv.room.remove'
    ]);
    Route::get('/room/{id}/edit',[
        'uses'=>'KtvRoomController@getEditRoom',
        'as'=>"ktv.room.edit"
    ]);
    Route::post('/room/update',[
        'uses'=>'KtvRoomController@postUpdateRoom',
        'as'=>'ktv.room.update'
    ]);
});


Route::group(['prefix'=>'admin','middleware'=>'role:Administrator'], function (){

   Route::get('/user/all',[
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
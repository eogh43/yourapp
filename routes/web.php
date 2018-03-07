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

/*Route::get('/', function () {
    return view('welcome');
});*/

//사용자 가입
Route::get('auth/register',[
    'as' => 'users.create',
    'uses' => 'UsersController@create'
]);
Route::Post('auth/register',[
    'as' => 'users.store',
    'uses' => 'UsersController@store'
]);
Route::get('auth/confirm/{code}',[
    'as' => 'users.confirm',
    'uses' => 'UsersController@confirm'
])->where('code','[\pL-\pN]{60}');

//사용자 인증

Route::get('auth/login',[
    'as'=>'sessions.create',
    'uses' => 'sessionsController@create'
]);
Route::post('auth/login',[
    'as'=>'sessions.store',
    'uses' => 'sessionsController@store'
]);
Route::get('auth/login',[
    'as'=>'sessions.destroy',
    'uses' => 'sessionsController@destroy'
]);

//비밀번호 초기화

Route::get('auth/remind',[
    'as' => 'remind.create',
    'uses' => 'PasswordsController@getRemind',
]);
Route::post('auth/remind',[
    'as' => 'remind.store',
    'uses' => 'PasswordsController@postRemind',
]);
Route::get('auth/remind/{token}',[
    'as' => 'remind.create',
    'uses' => 'PasswordsController@getReset',
]);
Route::post('auth/remind',[
    'as' => 'remind.store',
    'uses' => 'PasswordsController@getReset',
]);






Route::get('/home', [
    'as'=>'home',
    'uses'=>'HomeController@index',
    ]);

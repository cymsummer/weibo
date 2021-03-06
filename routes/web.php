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

Route::get('/', function () {
    return view('welcome');
});
//主页
Route::get("/","StaticPagesController@home")->name('home');

//帮助页
Route::get("/help","StaticPagesController@help")->name("help");

//关于页
Route::get("/about","StaticPagesController@about")->name('about');

//注册页面
Route::get("signup","UsersController@create")->name("signup");


//用户资源
Route::resource("users","UsersController");

//
// Route::get('/users', 'UsersController@index')->name('users.index');
// Route::get('/users/create', 'UsersController@create')->name('users.create');
// Route::get('/users/{user}', 'UsersController@show')->name('users.show');
// Route::post('/users', 'UsersController@store')->name('users.store');
// Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
// Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
// Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');


//操作会话控制器
Route::get('login','SessionsController@create')->name('login');
Route::post('login','SessionsController@store')->name('login');
Route::delete('logout','SessionsController@destory')->name('logout');

//对微博信息进行处理
Route::resource("statuses",'StatusesController',['only'=>['store','destroy']]);

//关注者列表与粉丝列表路由
Route::get('/users/{user}/followings','UsersController@followings')->name('users.followings');
Route::get('users/{user}/followers','UsersController@followers')->name('users.followers');


//关注用户
Route::post('users/followers/{user}','FollowersController@store')->name('followers.store');
Route::delete('users/followers/{user}','FollowersController@destroy')->name('followers.destroy');
























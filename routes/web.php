<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','StaticPages@home')->name('home');
Route::get('/help','StaticPages@help')->name('help');
Route::get('/about','StaticPages@about')->name('about');

// 注册页面的路由
Route::get('signup','Users@create')->name('signup');
//资源路由  第一个参数为资源名称 第二个参数为控制器名称
Route::resource('users','Users');

//路由声明时必须使用 Eloquent 模型的单数小写格式来作为路由片段参数，User 对应 {user}
Route::get('/users/{user}','Users@show')->name('users.show');
//会话
Route::get('login','Sessions@create')->name('login');
Route::post('login','Sessions@store')->name('login');
Route::delete('logout','Sessions@destroy')->name('logout');
/* 编辑用户 */
Route::get('/users/{user}/edit','Users@edit')->name('users.edit');
//Route::patch('/users/{user}/update','Users@update')->name('users.update');
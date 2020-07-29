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
Route::get('/vx/text','Vx\TextController@token');
Route::get('/vx/text2','Vx\TextController@token2');
Route::get('/vx/text3','Vx\TextController@token3');
Route::get('/vx/test','Vx\TextController@test');
Route::post('/vx/aes1','Vx\TextController@aes1');
Route::any('/vx/aes2','Vx\TextController@aes2');
Route::any('/vx/alipay','Vx\TextController@alipay');
Route::any('/alipay/return','Vx\TextController@alipay_return');
Route::any('/alipay/notify','Vx\TextController@alipay_notify');
Route::get('/vx/header1','Vx\TextController@header1');
Route::get('/mstore/reg','Mstore\RegController@add');
Route::post('/reg/adddo','Mstore\RegController@adddo');
Route::get('/mstore/login','Mstore\LoginController@add');
Route::post('login/adddo','Mstore\LoginController@adddo');
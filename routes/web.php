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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'LoginController@index') -> name('login');
Route::post('/login', 'LoginController@verify');

Route::get('/registration', 'AdminController@registration') -> name('registration');
Route::post('/registration', 'AdminController@user_reg') -> name('user_registration');


Route::get('/Dashboard', 'AdminController@index')->name('dashboard'); 

Route::get('/userlist', 'AdminController@userlist')->name('userlist');
Route::get('/delete/user/{id}','AdminController@deleteUser');
Route::post('/delete/user/{id}','AdminController@userDelete');
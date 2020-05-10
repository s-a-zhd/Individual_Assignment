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
Route::get('/edit/user/{id}','AdminController@userUpdate');
Route::post('/edit/user/{id}','AdminController@userEdit');


Route::resource('course', 'CourseController');

Route::get('/note', 'NoteController@index')->name('note');
Route::post('/note', 'NoteController@uploadNote')->name('note');

Route::get('/notice', 'NoticeController@index')->name('notice');
Route::post('/notice', 'NoticeController@uploadNotice')->name('notice');

Route::get('/search','SearchController@search')->name('search');
Route::get('/result','ResultController@result')->name('result');
Route::get('/result/upload/student/{id}','ResultController@result_upload');
Route::post('/result/upload/student/{id}','ResultController@upload');


Route::get('/salary','Salary@index')->name('salary');
Route::get('/add_salary','Salary@add_salary')->name('add_salary');
Route::post('/add_salary','Salary@insert_salary')->name('insert_salary');


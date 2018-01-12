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

Route::get('/', 'FrontController@index'); //main Frontend
Route::get('/blog/{slug}', 'FrontController@showblog'); //show blog

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home'); //main dashboard

Route::get('/admin/blog', 'HomeController@blog'); //view list

Route::get('/admin/add', 'HomeController@showadd'); //view add form
Route::post('/admin/add/store', 'HomeController@storeadd'); //proccess add

Route::get('/admin/edit/{id}', 'HomeController@showedit'); //view edit form
Route::put('/admin/edit/store/{id}', 'HomeController@storeedit'); //proccess edit

Route::get('/admin/delete/{id}', 'HomeController@deleteblog'); //delete blog

Route::get('/admin/profile', 'HomeController@profile'); //profile user
Route::get('/admin/profile/edit', 'HomeController@profileedit'); //profile edit view
Route::get('/admin/profile/{id}', 'HomeController@profileid'); //show single profile user
Route::put('/admin/profile/store/{id}', 'HomeController@profileeditstore'); //profile store

Route::get('/admin/user', 'HomeController@user'); //all user
Route::get('/admin/user/delete/{id}', 'HomeController@deleteuser'); //delete user

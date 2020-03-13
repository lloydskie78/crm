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

Route::get('/admin', function () {
    return view('layouts.layout');
});


Route::get('/admin/inbox', 'MailController@inbox')->name('inbox');
Route::get('/admin/compose', 'MailController@compose')->name('compose');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/clients', 'ClientController@index');
Route::get('/uploadFile', 'ClientController@index');
Route::post('/uploadFile', 'ClientController@uploadFile');

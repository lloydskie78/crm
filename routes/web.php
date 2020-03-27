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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'DashController@index')->name('dashboard');

Route::get('/dashboard', 'DashController@index')->name('dashboard');

Route::get('inbox', 'MailController@inbox')->name('inbox');
Route::get('compose', 'MailController@compose')->name('compose');

Route::get('/clients', 'ClientController@index');

Route::post('/insertData', 'ClientController@create');
Route::post('/fileImport', 'ClientController@fileImport');

Route::patch('/updateData/{id}', 'ClientController@edit');

Route::post('/deleteData/{id}', 'ClientController@destroy');

Route::get('/sms', 'SmsController@smsindex');

Route::get('/msgtemplate', 'MsgTemplateController@templateindex');

Route::post('/addTemplate', 'MsgTemplateController@insert');

Route::post('/addTemplate', 'MsgTemplateController@insert');
Route::post('/deleteTemplate/{id}', 'MsgTemplateController@delete');
Route::patch('/updateTemplate/{id}', 'MsgTemplateController@edit');

Route::get('/accounts', 'AccountsController@index');
Route::post('/deleteUser/{id}', 'AccountsController@destroy');

Route::get('/logout', 'Auth\LoginController@logout');


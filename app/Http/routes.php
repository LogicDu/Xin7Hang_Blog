<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','ArticlesController@index');
Route::get('auth/login','Auth\AuthController@getLogin');
Route::post('auth/login','Auth\AuthController@postLogin');

Route::get('auth/register','Auth\AuthController@getRegister');
Route::post('auth/register','Auth\AuthController@postRegister');

Route::get('auth/logout','Auth\AuthController@getLogout');

Route::get('articles/{id}/like','ArticlesController@like');
Route::get('articles/{id}/del','ArticlesController@destroy');
Route::get('articles/articleslist','ArticlesController@manage_index');
Route::resource('articles','ArticlesController');

Route::resource('categorys','CategorysController');
Route::get('tags/{id}/del','TagsController@destroy');
Route::resource('tags','TagsController');


Route::get('categorys/{id}/del','CategorysController@destroy');

Route::get('options','OptionsController@index');
Route::post('options/store','OptionsController@store');
Route::patch('options/update','OptionsController@update');

Route::get('upload','UploadController@index');
Route::post('upload/file', 'UploadController@uploadFile');

Route::post('upload/image','UploadController@uploadImage');
Route::delete('upload/file', 'UploadController@deleteFile');
Route::post('upload/folder', 'UploadController@createFolder');
Route::delete('upload/folder', 'UploadController@deleteFolder');

Route::get('admin/trash','AdminController@TrashArticles');
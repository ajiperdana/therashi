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



Route::get('/','HomeController@index');

Route::get('/location_data', 'LocationDataController@view_data');
Route::get('/location_data/add', 'LocationDataController@add');
Route::post('/location_data/store','LocationDataController@store');
Route::get('/location_data/edit/{id}','LocationDataController@edit');
Route::post('/location_data/update','LocationDataController@update');
Route::get('/location_data/delete/{id}','LocationDataController@delete');
Route::get('/find','LocationDataController@find');

Route::get('/login', 'SessionController@index');
Route::post('/post-login', 'SessionController@postLogin'); 
Route::get('/registration', 'SessionController@registration');
Route::post('/post-registration', 'SessionController@postRegistration'); 
Route::get('/dashboard', 'SessionController@dashboard'); 
Route::post('/logout', 'SessionController@logout');

Route::get('/upload', 'UploadController@upload');
Route::post('/upload/proses', 'UploadController@proses_upload');

Route::get('/location/{name}','LocationDataController@location');


Route::get('/about','HomeController@about');

Route::get('/contact', function(){
    return view('contact');
});








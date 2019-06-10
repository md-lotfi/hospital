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

Route::get('cvs', 'CvController@index');
Route::get('cvs/create', 'CvController@create');
Route::post('cvs', 'CvController@store');
Route::get('cvs/{id}/edit', 'CvController@edit');
Route::put('cvs/{id}', 'CvController@update');
Route::delete('cvs/{id}', 'CvController@destroy');

Route::get('medecin', 'MedecinController@index');
Route::get('medecin/create', 'MedecinController@create');
Route::post('medecin', 'MedecinController@store');
Route::get('medecin/{id}/edit', 'MedecinController@edit');
Route::put('medecin/{id}', 'MedecinController@update');
Route::delete('medecin/{id}', 'MedecinController@destroy');

Route::get('admission', 'AdmissionController@index');
Route::get('admission/create', 'AdmissionController@create');
Route::post('admission', 'AdmissionController@store');
Route::get('admission/{id}/edit', 'AdmissionController@edit');
Route::put('admission/{id}', 'AdmissionController@update');
Route::delete('admission/{id}', 'AdmissionController@destroy');


Route::get('salle', 'SallController@index');
Route::get('salle/create', 'SallController@create');
Route::post('salle', 'SallController@store');
Route::get('salle/{id}/edit', 'SallController@edit');
Route::put('salle/{id}', 'SallController@update');
Route::delete('salle/{id}', 'SallController@destroy');

Route::get('service', 'ServiceController@index');
Route::get('service/create', 'ServiceController@create');
Route::post('service', 'ServiceController@store');
Route::get('service/{id}/edit', 'ServiceController@edit');
Route::put('service/{id}', 'ServiceController@update');
Route::delete('service/{id}', 'ServiceController@destroy');

Route::get('patient', 'PatientController@index');
Route::get('patient/create', 'PatientController@create');
Route::post('patient', 'PatientController@store');
Route::get('patient/update/{id}', 'PatientController@update');
Route::get('patient/delete/{id}', 'PatientController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

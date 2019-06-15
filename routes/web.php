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

Route::get('service', 'ServiceController@index');
Route::get('service/create', 'ServiceController@create');
Route::post('service', 'ServiceController@store');
Route::get('service/get/{id}', 'ServiceController@edit');
Route::post('service/update', 'ServiceController@update');
Route::get('service/remove/{id}', 'ServiceController@destroy');

Route::get('unite/{id_service}', 'UniteController@index');
Route::get('unite/create/{id_service}', 'UniteController@create');
Route::post('unite', 'UniteController@store');
Route::get('unite/get/{id_unite}', 'UniteController@edit');
Route::post('unite/update', 'UniteController@update');
Route::get('unite/remove/{id_unite}', 'UniteController@destroy');

Route::get('salle/{id_unite}', 'SallController@index');
Route::get('salle/create/{id_unite}', 'SallController@create');
Route::post('salle', 'SallController@store');
Route::get('salle/get/{id_salle}', 'SallController@edit');
Route::post('salle/update', 'SallController@update');
Route::get('salle/remove/{id_salle}', 'SallController@destroy');

Route::get('lit/{id_salle}', 'LitController@index');
Route::get('lit/create/{id_salle}', 'LitController@create');
Route::post('lit', 'LitController@store');
Route::get('lit/get/{id_lit}', 'LitController@edit');
Route::post('lit/update', 'LitController@update');
Route::get('lit/remove/{id_lit}', 'LitController@destroy');

Route::get('patientlit/service/{id_adm}', 'PatientLitController@service');
Route::get('patientlit/unite/{id_adm}/{id_service}', 'PatientLitController@unite');
Route::get('patientlit/salle/{id_adm}/{id_unite}', 'PatientLitController@salle');
Route::get('patientlit/lit/{id_adm}/{id_salle}', 'PatientLitController@lit');
Route::post('patientlit/select/next', 'PatientLitController@next');

Route::get('gardem', 'GardeMaladeController@index');
Route::get('gardem/create', 'GardeMaladeController@create');
Route::post('gardem', 'GardeMaladeController@store');
Route::get('gardem/get/{id_gardem}', 'GardeMaladeController@edit');
Route::post('gardem/update', 'GardeMaladeController@update');
Route::get('gardem/remove/{id_gardem}', 'GardeMaladeController@destroy');

Route::get('patient', 'PatientController@index');
Route::get('patient/create', 'PatientController@create');
Route::post('patient', 'PatientController@store');
Route::get('patient/get/{id}', 'PatientController@get');
Route::get('patient/update/{id}', 'PatientController@update');
Route::get('patient/delete/{id}', 'PatientController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

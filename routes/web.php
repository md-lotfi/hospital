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

Route::get('assign/add/{id_adm}', 'GardemAdmController@create');
Route::post('gardemAdm', 'GardemAdmController@store');
Route::get('dconfig_show/{id_adm}/{id_gardem}', 'GardemAdmController@dconfig_show');
Route::post('dconfig_show', 'GardemAdmController@dconfig_store');
Route::get('gardem/historique/{id_patient}', 'GardemAdmController@myGardem');
//Route::index('gardemadm', 'GardemAdmController@index');

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

Route::get('infermiere', 'InfermiereController@index');
Route::get('infermiere/create', 'InfermiereController@create');
Route::post('infermiere', 'InfermiereController@store');
Route::get('infermiere/get/{id_gardem}', 'InfermiereController@edit');
Route::post('infermiere/update', 'InfermiereController@update');
Route::get('infermiere/remove/{id_gardem}', 'InfermiereController@destroy');

Route::get('secretaire', 'SecretaireController@index');
Route::get('secretaire/create', 'SecretaireController@create');
Route::post('secretaire', 'SecretaireController@store');
Route::get('secretaire/get/{id_sec}', 'SecretaireController@edit');
Route::post('secretaire/update', 'SecretaireController@update');
Route::get('secretaire/remove/{id_sec}', 'SecretaireController@destroy');

Route::get('medecin', 'MedecinController@index');
Route::get('medecin/create', 'MedecinController@create');
Route::post('medecin', 'MedecinController@store');
Route::get('medecin/get/{id}', 'MedecinController@edit');
Route::post('medecin/update', 'MedecinController@update');
Route::get('medecin/remove/{id}', 'MedecinController@destroy');

Route::get('medicament', 'MedicamentController@index');
Route::get('medicament/create', 'MedicamentController@create');
Route::post('medicament', 'MedicamentController@store');
Route::get('medicament/get/{id_gardem}', 'MedicamentController@edit');
Route::post('medicament/update', 'MedicamentController@update');
Route::get('medicament/remove/{id_gardem}', 'MedicamentController@destroy');

Route::get('soin/{id_patient}', 'SoinController@index');
Route::get('soins/create/{id_patient}', 'SoinController@create');
Route::post('soin', 'SoinController@store');
Route::get('soin/get/{id_patient}', 'SoinController@edit');
Route::post('soin/update', 'SoinController@update');
Route::get('soin/remove/{id_patient}', 'SoinController@destroy');

Route::get('prelevement/{id_patient}', 'PrelevementController@index');
Route::get('prelevement/create/{id_patient}', 'PrelevementController@create');
Route::post('prelevement', 'PrelevementController@store');
Route::get('prelevement/get/{id_patient}', 'PrelevementController@edit');
Route::post('prelevement/update', 'PrelevementController@update');
Route::get('prelevement/remove/{id_patient}', 'PrelevementController@destroy');

Route::get('consigne/{id_patient}', 'ConsigneController@index');
Route::get('consigne/create/{id_patient}', 'ConsigneController@create');
Route::post('consigne', 'ConsigneController@store');
Route::get('consigne/get/{id_consigne}', 'ConsigneController@edit');
Route::post('consigne/update', 'ConsigneController@update');
Route::get('consigne/remove/{id_consigne}', 'ConsigneController@destroy');

Route::get('patient', 'PatientController@index');
Route::get('patient/create', 'PatientController@create');
Route::post('patient', 'PatientController@store');
Route::get('patient/get/{id}', 'PatientController@get');
Route::get('patient/update/{id}', 'PatientController@update');
Route::get('patient/delete/{id}', 'PatientController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

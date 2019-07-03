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

Route::get('admission/{id_patient}', 'AdmissionController@index');
Route::get('admission/create/{id_patient}', 'AdmissionController@create');
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

Route::get('analyse', 'AnalyseController@index');
Route::get('analyse/create', 'AnalyseController@create');
Route::post('analyse', 'AnalyseController@store');
Route::get('analyse/get/{id_analyse}', 'AnalyseController@edit');
Route::post('analyse/update', 'AnalyseController@update');
Route::get('analyse/remove/{id_analyse}', 'AnalyseController@destroy');

Route::get('radio', 'RadioController@index');
Route::get('radio/create', 'RadioController@create');
Route::post('radio', 'RadioController@store');
Route::get('radio/get/{id_radio}', 'RadioController@edit');
Route::post('radio/update', 'RadioController@update');
Route::get('radio/remove/{id_radio}', 'RadioController@destroy');

Route::get('analyse/patient/index/{id_adm}', 'PatientAnalyseController@index');
Route::get('analyse/patient/create/{id_adm}', 'PatientAnalyseController@create');
Route::post('analyse/patient/store', 'PatientAnalyseController@store');
Route::post('analyse/patient/update', 'PatientAnalyseController@update');
Route::get('analyse/patient/get/{id_pa}', 'PatientAnalyseController@edit');
Route::get('analyse/patient/remove/{id_pa}', 'PatientAnalyseController@destroy');

Route::get('radio/patient/index/{id_adm}', 'PatientRadioController@index');
Route::get('radio/patient/create/{id_adm}', 'PatientRadioController@create');
Route::post('radio/patient/store', 'PatientRadioController@store');
Route::post('radio/patient/update', 'PatientRadioController@update');
Route::get('radio/patient/get/{id_pa}', 'PatientRadioController@edit');
Route::get('radio/patient/remove/{id_pa}', 'PatientRadioController@destroy');

Route::get('soin/{id_adm}', 'SoinController@index');
Route::get('soins/create/{id_adm}', 'SoinController@create');
Route::post('soin', 'SoinController@store');
Route::get('soin/get/{id_soin}', 'SoinController@edit');
Route::post('soin/update', 'SoinController@update');
Route::get('soin/remove/{id_soin}', 'SoinController@destroy');

Route::get('soin/show/buttons', 'SoinController@buttons');

Route::get('spatient/{id_adm}', 'SortiePatientController@index');
Route::get('spatient/create/{id_adm}', 'SortiePatientController@create');
Route::post('spatient', 'SortiePatientController@store');
Route::get('spatient/get/{id_sp}', 'SortiePatientController@edit');
Route::post('spatient/update', 'SortiePatientController@update');
Route::get('spatient/remove/{id_sp}', 'SortiePatientController@destroy');

Route::get('prelevement/{id_adm}', 'PrelevementController@index');
Route::get('prelevement/create/{id_adm}', 'PrelevementController@create');
Route::post('prelevement', 'PrelevementController@store');
Route::get('prelevement/get/{id_adm}', 'PrelevementController@edit');
Route::post('prelevement/update', 'PrelevementController@update');
Route::get('prelevement/remove/{id_adm}', 'PrelevementController@destroy');

Route::get('psychotrope/{id_adm}', 'PsychotropeController@index');
Route::get('psychotrope/create/{id_admid_adm}', 'PsychotropeController@create');
Route::post('psychotrope', 'PsychotropeController@store');
Route::get('psychotrope/get/{id_psy}', 'PsychotropeController@edit');
Route::post('psychotrope/update', 'PsychotropeController@update');
Route::get('psychotrope/remove/{id_psy}', 'PsychotropeController@destroy');

Route::get('prescrire/{id_adm}', 'PrescrireController@index');
Route::get('prescrire/create/{id_admid_adm}', 'PrescrireController@create');
Route::post('prescrire', 'PrescrireController@store');
Route::get('prescrire/get/{id_psy}', 'PrescrireController@edit');
Route::post('prescrire/update', 'PrescrireController@update');
Route::get('prescrire/remove/{id_psy}', 'PrescrireController@destroy');

Route::get('messages', 'MessagesController@index');
Route::get('patient/search/{action}/{route}', 'PatientSearchController@index');
Route::post('patient/search', 'PatientSearchController@find');

Route::get('detail/soin/{id_adm}', 'DetailSoinController@index');

Route::get('consigne/{id_adm}', 'ConsigneController@index');
Route::get('consigne/create/{id_adm}', 'ConsigneController@create');
Route::post('consigne', 'ConsigneController@store');
Route::get('consigne/get/{id_consigne}', 'ConsigneController@edit');
Route::post('consigne/update', 'ConsigneController@update');
Route::get('consigne/remove/{id_consigne}', 'ConsigneController@destroy');
Route::get('consigne/all/unreceived', 'ConsigneController@all');

Route::get('ordonnances/{id_adm}', 'OrdonnanceController@index');
Route::get('ordonnances/create/{id_adm}', 'OrdonnanceController@create');
Route::post('ordonnances', 'OrdonnanceController@store');
Route::get('ordonnances/get/{id_consigne}', 'OrdonnanceController@edit');
Route::post('ordonnances/update', 'OrdonnanceController@update');
Route::get('ordonnances/remove/{id_consigne}', 'OrdonnanceController@destroy');

Route::get('ordonnances/medic/list/{id_ord}', 'OrdonnanceMedicController@index');
Route::get('ordonnances/medic/add/{id_ord}/{id_adm}', 'OrdonnanceMedicController@create');
Route::post('ordonnances/medic/store', 'OrdonnanceMedicController@store');
Route::post('ordonnances/medic/update', 'OrdonnanceMedicController@update');
Route::get('ordonnances/medic/remove/{id_ord_medic}', 'OrdonnanceMedicController@destroy');
Route::get('ordonnances/medic/get/{id_ord_medic}', 'OrdonnanceMedicController@edit');
/*Route::get('ordonnances/create/{id_adm}', 'OrdonnancesController@create');
Route::post('ordonnances', 'ConsigneController@store');
Route::get('ordonnances/get/{id_consigne}', 'ConsigneController@edit');
Route::post('ordonnances/update', 'ConsigneController@update');:
Route::get('ordonnances/remove/{id_consigne}', 'ConsigneController@destroy');*/

Route::get('patient', 'PatientController@index');
Route::get('patient/create', 'PatientController@create');
Route::post('patient', 'PatientController@store');
Route::get('patient/get/{id}', 'PatientController@get');
Route::get('patient/update/{id}', 'PatientController@update');
Route::get('patient/delete/{id}', 'PatientController@destroy');
Route::post('patient/form/search', 'PatientController@search');
Route::post('patient/form/locate', 'PatientController@locate');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

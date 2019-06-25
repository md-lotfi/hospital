<?php

namespace SP\Http\Controllers;

use SP\Admission;
use SP\Infermiere;
use SP\Lit;
use SP\Medicaments;
use SP\Patient;
use SP\PatientLit;
use SP\Prelevement;
use SP\Psychotrope;
use SP\Sall;
use SP\Service;
use SP\Soin;
use SP\Unite;
use SP\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

/**
 * Affiche soin des patients
 * Class SoinController
 * @package SP\Http\Controllers
 */
class DetailSoinController extends Controller
{

    /**
     * Afficher les soins des patients déja enregistrer
     * @param $id_patient
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id_adm){
        $soins = Soin::getSoin($id_adm);

        $prelevs = Prelevement::where('prelevements.id_adm', $id_adm)
            ->Join('admissions', 'admissions.id_adm', '=', 'prelevements.id_adm')
            ->leftJoin('patients', 'patients.id_patient', '=', 'admissions.id_patient')
            ->leftJoin('infirmiere', 'infirmiere.id_inf', '=', 'prelevements.id_inf')
            ->leftJoin('users', 'users.id', '=', 'infirmiere.id_user')
            //->orderBy('name', 'desc')
            ->get();

        $psys = Psychotrope::where('psychtropes.id_adm', $id_adm)
            ->Join('admissions', 'admissions.id_adm', '=', 'psychtropes.id_adm')
            ->leftJoin('patients', 'patients.id_patient', '=', 'admissions.id_patient')
            ->leftJoin('infirmiere', 'infirmiere.id_inf', '=', 'psychtropes.id_inf')
            ->leftJoin('medecin', 'medecin.id_med', '=', 'psychtropes.id_med')
            ->leftJoin('users', 'users.id', '=', 'infirmiere.id_user')
            //->orderBy('name', 'desc')
            ->get();

        $patient = Admission::getPatientAdm($id_adm);

        return view('detailSoin.index', ['soins' => $soins, 'prelevs'=> $prelevs, 'psys'=>$psys, 'patient'=>$patient, 'id_adm'=>$id_adm]);
    }

}
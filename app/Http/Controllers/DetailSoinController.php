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
    public function index($id_patient){
        $soins = Soin::where('soins.id_patient', $id_patient)
            ->leftJoin('patients', 'patients.id_patient', '=', 'soins.id_patient')
            ->leftJoin('infirmiere', 'infirmiere.id_inf', '=', 'soins.id_inf')
            ->leftJoin('medicaments', 'medicaments.id_medic', '=', 'soins.id_medic')
            ->leftJoin('users', 'users.id', '=', 'infirmiere.id_user')
            //->orderBy('name', 'desc')
            ->get();

        $prelevs = Prelevement::where('prelevements.id_patient', $id_patient)
            ->leftJoin('patients', 'patients.id_patient', '=', 'prelevements.id_patient')
            ->leftJoin('infirmiere', 'infirmiere.id_inf', '=', 'prelevements.id_inf')
            ->leftJoin('users', 'users.id', '=', 'infirmiere.id_user')
            //->orderBy('name', 'desc')
            ->get();

        $psys = Psychotrope::where('psychtropes.id_patient', $id_patient)
            ->leftJoin('patients', 'patients.id_patient', '=', 'psychtropes.id_patient')
            ->leftJoin('infirmiere', 'infirmiere.id_inf', '=', 'psychtropes.id_inf')
            ->leftJoin('medecin', 'medecin.id_med', '=', 'psychtropes.id_med')
            ->leftJoin('users', 'users.id', '=', 'infirmiere.id_user')
            //->orderBy('name', 'desc')
            ->get();

        $patient = Patient::where('id_patient', $id_patient)->get()->first();

        return view('detailSoin.index', ['soins' => $soins, 'prelevs'=> $prelevs, 'psys'=>$psys, 'patient'=>$patient, 'id_patient'=>$id_patient]);
        /*var_dump($inf);
        exit();*/
        /*$soins = Soin::where('soins.id_patient', $id_patient)
            ->leftJoin('patients', 'patients.id_patient', '=', 'soins.id_patient')
            ->leftJoin('infirmiere', 'infirmiere.id_inf', '=', 'soins.id_inf')
            ->leftJoin('medicaments', 'medicaments.id_medic', '=', 'soins.id_medic')
            ->leftJoin('users', 'users.id', '=', 'infirmiere.id_user')
            //->orderBy('name', 'desc')
            ->get();
        return view('soin.index', ['soins' => $soins, 'id_patient'=>$id_patient]);*/
    }

}
<?php

namespace SP\Http\Controllers;

use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use SP\Admission;
use SP\Infermiere;
use SP\Lit;
use SP\Medecin;
use SP\Medicaments;
use SP\Patient;
use SP\PatientAnalyse;
use SP\PatientAnalyseMaster;
use SP\PatientLit;
use SP\Sall;
use SP\Secretaire;
use SP\Service;
use SP\Soin;
use SP\SortiePatient;
use SP\Unite;
use SP\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

/**
 * Class SoinController
 * @package SP\Http\Controllers
 */
class SortiePatientController extends Controller
{
    const TABLE = 'sortie_patient';

    /**
     * @param $id_patient
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id_adm){
        $sortie = SortiePatient::where('sortie_patient.id_adm', $id_adm)
            ->leftJoin('admissions', 'admissions.id_adm', '=', 'sortie_patient.id_adm')
            ->leftJoin('patients', 'patients.id_patient', '=', 'admissions.id_patient')
            ->leftJoin('secretaire', 'secretaire.id_sec', '=', 'sortie_patient.id_med')
            ->leftJoin('users', 'users.id', '=', 'secretaire.id_user')
            //->orderBy('name', 'desc')
            ->get()->first();
        return view('spatient.index', ['sortie' => $sortie, 'id_adm'=>$id_adm]);
    }

    public function create($id_adm) {
        return view('spatient.create', ['id_adm'=>$id_adm]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        if( $user ) {
            if( $user->type = User::SECRETAIRE_TYPE ) {
                $med = Secretaire::where('id_user', $user->id)->get()->first();
                if( $med ) {
                    $sp = new SortiePatient();
                    $sp->id_adm = $request->input('id_adm');
                    $sp->id_med = $med->id_sec;
                    $sp->diagnostic = $request->input('diagnostic');
                    $sp->type = $request->input('type');
                    $sp->date_sortie = $request->input('date_sortie');
                    $sp->heur_sortie = $request->input('heur_sortie');
                    $sp->save();
                    PatientLit::where('id_adm', $request->input('id_adm'))->update(['busy'=> PatientLit::LIT_FREE]);
                }
            }
        }
        $p = Admission::getPatientAdm($request->input('id_adm'));
        return redirect('/patient/get/'.$p->id_patient);
    }

    public function print($id_sp){
        $sortie = SortiePatient::where('sortie_patient.id_sp', $id_sp)
            ->leftJoin('admissions', 'admissions.id_adm', '=', 'sortie_patient.id_adm')
            ->leftJoin('patients', 'patients.id_patient', '=', 'admissions.id_patient')
            ->leftJoin('secretaire', 'secretaire.id_sec', '=', 'sortie_patient.id_med')
            ->leftJoin('users', 'users.id', '=', 'secretaire.id_user')
            //->orderBy('name', 'desc')
            ->get()->first();
        return PDF::loadView('spatient.print', ['sortie' => $sortie])
            ->setPaper('a4')
            /*->setOption('page-width', '116.9')
            ->setOption('page-height', '139.7')*/
            ->setOrientation('portrait')
            ->setOption('margin-bottom', 2)
            ->setOption('margin-top', 5)
            ->setOption('margin-right', 2)
            ->setOption('margin-left', 2)
            ->inline();
    }
}
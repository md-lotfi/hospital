<?php

namespace SP\Http\Controllers;

use SP\Admission;
use SP\Infermiere;
use SP\Lit;
use SP\Medecin;
use SP\Medicaments;
use SP\Patient;
use SP\PatientLit;
use SP\Sall;
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
    public function index($id_patient){
        /*$sortie = SortiePatient::where('sortie_patient.id_patient', $id_patient)
            ->leftJoin('patients', 'patients.id_patient', '=', 'sortie_patient.id_patient')
            ->leftJoin('medecin', 'medecin.id_med', '=', 'sortie_patient.id_med')
            ->leftJoin('users', 'users.id', '=', 'medecin.id_user')
            //->orderBy('name', 'desc')
            ->get();
        return view('spatient.index', ['sortie' => $sortie, 'id_patient'=>$id_patient]);*/
    }

    public function create($id_patient) {
        return view('spatient.create', ['id_patient'=>$id_patient]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        if( $user ) {
            if( $user->type = User::MEDECIN_TYPE ) {
                $med = Medecin::where('id_user', $user->id)->get()->first();
                if( $med ) {
                    $sp = new SortiePatient();
                    $sp->id_patient = $request->input('id_patient');
                    $sp->id_med = $med->id_med;
                    $sp->diagnostic = $request->input('diagnostic');
                    $sp->type = $request->input('type');
                    $sp->date_sortie = $request->input('date_sortie');
                    $sp->save();
                }
            }
        }
        return redirect('/patient/get/'.$request->input('id_patient'));
    }

    /*public function edit($id_soin) {
        $medics = Medicaments::all();
        $soin = Soin::where('id_soin', $id_soin)->get()->first();
        return view('soin.edit', ['soin'=>$soin, 'medics'=>$medics]);
    }

    public function update(Request $request) {
        $soin = Soin::where(self::TABLE.'.id_soin', $request->input('id_soin'));
        $id_patient = $soin->get()->first()->id_patient;
        $soin->update(
            [
                'id_medic' => $request->input('id_medic'),
                'dose_admini' => $request->input('dose'),
                'voie' => $request->input('nom_voie')
            ]
        );
        return redirect('soin/'.$id_patient);
    }

    public function destroy($id_soin) {
        $soin = Soin::find($id_soin);
        $id_patient = $soin->get()->first()->id_patient;
        $soin->delete();
        return redirect('soin/'.$id_patient);
    }*/
}
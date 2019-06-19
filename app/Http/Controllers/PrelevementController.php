<?php

namespace App\Http\Controllers;

use App\Admission;
use App\Infermiere;
use App\Lit;
use App\Medicaments;
use App\Patient;
use App\PatientLit;
use App\Prelevement;
use App\Sall;
use App\Service;
use App\Soin;
use App\Unite;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PrelevementController extends Controller
{
    const TABLE = 'prelevements';

    /**
     * Afficher les soins des patients déja enregistrer
     * @param $id_patient
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id_patient){
        $prelvs = Prelevement::where('prelevements.id_patient', $id_patient)
            ->leftJoin('patients', 'patients.id_patient', '=', 'prelevements.id_patient')
            ->leftJoin('infirmiere', 'infirmiere.id_inf', '=', 'prelevements.id_inf')
            ->leftJoin('medecin', 'medecin.id_med', '=', 'prelevements.id_med')
            ->leftJoin('users as u_inf', 'u_inf.id', '=', 'infirmiere.id_user')
            ->leftJoin('users as u_med', 'u_med.id', '=', 'medecin.id_user')
            ->select(
                'patients.*',
                'infirmiere.*',
                'medecin.*',
                'u_inf.name as name_inf',
                'u_med.name as name_med'
            )
            ->get();
        return view('prelevement.index', ['prelevs' => $prelvs, 'id_patient'=>$id_patient]);
    }

    public function create($id_patient) {
        $medics = Medicaments::all();
        return view('soin.create', ['medics'=>$medics, 'id_patient'=>$id_patient]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        if( $user ) {
            if( $user->type = User::INFERMIERE_TYPE ) {
                $inf = Infermiere::where('id_user', $user->id)->get()->first();
                $medic = new Soin();
                $medic->id_patient = $request->input('id_patient');
                $medic->id_inf = $inf->id_inf;
                $medic->id_medic = $request->input('id_medic');
                $medic->voie = $request->input('nom_voie');
                $medic->dose_admini = $request->input('dose');
                $medic->save();
            }
        }
        return redirect('soin/'.$request->input('id_patient'));
    }

    public function edit($id_soin) {
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
    }
}
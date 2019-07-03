<?php

namespace SP\Http\Controllers;

use SP\Admission;
use SP\Infermiere;
use SP\Lit;
use SP\Medicaments;
use SP\Patient;
use SP\PatientLit;
use SP\Sall;
use SP\Service;
use SP\Soin;
use SP\Unite;
use SP\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

/**
 * Normalment médicament
 * Class SoinController
 * @package SP\Http\Controllers
 */
class SoinController extends Controller
{
    const TABLE = 'soins';

    /**
     * Afficher les soins des patients déja enregistrer
     * @param $id_patient
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id_adm){
        $soins = Soin::where('soins.id_adm', $id_adm)
            ->join('admissions', 'admissions.id_adm', '=', 'soins.id_adm')
            ->leftJoin('patients', 'patients.id_patient', '=', 'admissions.id_patient')
            ->leftJoin('infirmiere', 'infirmiere.id_inf', '=', 'soins.id_inf')
            ->leftJoin('medicaments', 'medicaments.id_medic', '=', 'soins.id_medic')
            ->leftJoin('users', 'users.id', '=', 'infirmiere.id_user')
            //->orderBy('name', 'desc')
            ->get();
        return view('soin.index', ['soins' => $soins, 'id_adm'=>$id_adm]);
    }

    public function create($id_adm) {
        $medics = Medicaments::all();
        $p = Admission::getPatientAdm($id_adm);
        return view('soin.create', ['medics'=>$medics, 'age'=>Patient::getAge($p->datenai), 'patient'=>$p, 'id_adm'=>$id_adm]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        if( $user ) {
            if( $user->type = User::INFERMIERE_TYPE ) {
                $inf = Infermiere::where('id_user', $user->id)->get()->first();
                $medic = new Soin();
                $medic->id_adm = $request->input('id_adm');
                $medic->id_inf = $inf->id_inf;
                $medic->id_medic = $request->input('id_medic');
                $medic->voie = $request->input('nom_voie');
                $medic->dose_admini = $request->input('dose');
                $medic->save();
            }
        }
        return redirect('soin/'.$request->input('id_adm'));
    }

    public function edit($id_soin) {
        $medics = Medicaments::all();
        $soin = Soin::where('id_soin', $id_soin)->get()->first();
        return view('soin.edit', ['soin'=>$soin, 'medics'=>$medics]);
    }

    public function update(Request $request) {
        $soin = Soin::where(self::TABLE.'.id_soin', $request->input('id_soin'));
        $id_adm = $soin->get()->first()->id_adm;
        $soin->update(
            [
                'id_medic' => $request->input('id_medic'),
                'dose_admini' => $request->input('dose'),
                'voie' => $request->input('nom_voie')
            ]
        );
        return redirect('soin/'.$id_adm);
    }

    public function destroy($id_soin) {
        $soin = Soin::find($id_soin);
        $id_adm = $soin->get()->first()->id_adm;
        $soin->delete();
        return redirect('soin/'.$id_adm);
    }

    public function buttons(){
        return view('soin.buttons');
    }
}
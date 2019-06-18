<?php

namespace App\Http\Controllers;

use App\Admission;
use App\Infermiere;
use App\Lit;
use App\Medicaments;
use App\Patient;
use App\PatientLit;
use App\Sall;
use App\Service;
use App\Soin;
use App\Unite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoinController extends Controller
{
    const TABLE = 'soins';

    /**
     * Afficher les soins des patients déja enregistrer
     * @param $id_patient
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mesSoins($id_patient){
        $soins = Soin::where('id_patient', $id_patient)
            ->leftJoin('infermiere', 'patients.id_inf', '=', 'soin.id_inf')
            ->leftJoin('medicaments', 'medicaments.id_medic', '=', 'soin.id_medic')
            //->orderBy('name', 'desc')
            ->get();
        return view('soin.index', ['soins' => $soins]);
    }

    /**
     * Show form to store link
     * @param $id_patient
     * @param $id_medic
     * @param $id_inf
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function link($id_patient, $id_medic){
        $medics = Medicaments::all();
        return view('soin.index', ['medics' => $medics, 'id_patient'=>$id_patient, 'id_medic'=>$id_medic]);
    }

    public function link_store(Request $request){
        $soin = new Soin();
        $soin->id_medic = $request->input('id_medic');
        $soin->id_patient = $request->input('id_patient');
        $soin->id_inf = $request->input('id_inf');
        $soin->save();
        return redirect('soin');
    }
}
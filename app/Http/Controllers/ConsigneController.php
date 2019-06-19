<?php

namespace App\Http\Controllers;

use App\Admission;
use App\Consigne;
use App\Infermiere;
use App\Lit;
use App\Medecin;
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

class ConsigneController extends Controller
{
    const TABLE = 'consigne';

    /**
     * Afficher les soins des patients déja enregistrer
     * @param $id_patient
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id_patient){
        $consignes = Consigne::where('consigne.id_patient', $id_patient)
            ->Join('patients', 'patients.id_patient', '=', 'consigne.id_patient')
            ->Join('medecin', 'medecin.id_med', '=', 'consigne.id_medecin')
            ->Join('users', 'users.id', '=', 'medecin.id_user')
            ->get();
        return view('consigne.index', ['consignes' => $consignes, 'id_patient'=>$id_patient]);
    }

    public function create($id_patient) {
        return view('consigne.create', ['id_patient'=>$id_patient]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        if( $user ) {
            if( $user->type = User::MEDECIN_TYPE ) {
                $med = Medecin::where('id_user', $user->id)->get()->first();
                $cons = new Consigne();
                $cons->id_patient = $request->input('id_patient');
                $cons->id_medecin = $med->id_med;
                $cons->observation = $request->input('observation');
                $cons->save();
            }
        }
        return redirect('consigne/'.$request->input('id_patient'));
    }

    public function edit($id_consigne) {
        $cons = Consigne::where('id_consigne', $id_consigne)->get()->first();
        return view('consigne.edit', ['consigne'=>$cons]);
    }

    public function update(Request $request) {
        $consigne = Consigne::where(self::TABLE.'.id_consigne', $request->input('id_consigne'));
        $id_patient = $consigne->get()->first()->id_patient;
        $consigne->update(
            [
                'observation' => $request->input('observation')
            ]
        );
        return redirect('consigne/'.$id_patient);
    }

    public function destroy($id_prel) {
        $consigne = Consigne::find($id_prel);
        $id_patient = $consigne->get()->first()->id_patient;
        $consigne->delete();
        return redirect('consigne/'.$id_patient);
    }
}
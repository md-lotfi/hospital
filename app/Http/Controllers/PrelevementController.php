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
            ->leftJoin('users as u_inf', 'u_inf.id', '=', 'infirmiere.id_user')
            ->select(
                'prelevements.*',
                'patients.*',
                'infirmiere.*',
                'u_inf.name as name_inf'
            )
            ->get();
        return view('prelevement.index', ['prelevs' => $prelvs, 'id_patient'=>$id_patient]);
    }

    public function create($id_patient) {
        return view('prelevement.create', ['id_patient'=>$id_patient]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        if( $user ) {
            if( $user->type = User::INFERMIERE_TYPE ) {
                $inf = Infermiere::where('id_user', $user->id)->get()->first();
                $prelev = new Prelevement();
                $prelev->id_patient = $request->input('id_patient');
                $prelev->id_inf = $inf->id_inf;
                $prelev->temp = $request->input('temp');
                $prelev->poid = $request->input('poid');
                $prelev->taille = $request->input('taille');
                $prelev->pouls = $request->input('pouls');
                $prelev->tension_bas = $request->input('tension_bas');
                $prelev->tension_haut = $request->input('tension_bas');
                $prelev->glecymie = $request->input('glecemie');
                $prelev->diurese = $request->input('diurese');
                $prelev->observation = $request->input('observation');
                $prelev->save();
            }
        }
        return redirect('prelevement/'.$request->input('id_patient'));
    }

    public function edit($id_prel) {
        $prel = Prelevement::where('id_prel', $id_prel)->get()->first();
        return view('prelevement.edit', ['prel'=>$prel]);
    }

    public function update(Request $request) {
        $prel = Prelevement::where(self::TABLE.'.id_prel', $request->input('id_prel'));
        $id_patient = $prel->get()->first()->id_patient;
        $prel->update(
            [
                'temp' => $request->input('temp'),
                'poid' => $request->input('poid'),
                'taille' => $request->input('taille'),
                'pouls' => $request->input('pouls'),
                'tension_bas' => $request->input('tension_bas'),
                'tension_haut' => $request->input('tension_haut'),
                'glecymie' => $request->input('glecemie'),
                'diurese' => $request->input('diurese'),
                'observation' => $request->input('observation')
            ]
        );
        return redirect('prelevement/'.$id_patient);
    }

    public function destroy($id_prel) {
        $prel = Prelevement::find($id_prel);
        $id_patient = $prel->get()->first()->id_patient;
        $prel->delete();
        return redirect('prelevement/'.$id_patient);
    }
}
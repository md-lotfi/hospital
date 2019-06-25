<?php

namespace SP\Http\Controllers;

use SP\Admission;
use SP\Infermiere;
use SP\Lit;
use SP\Medicaments;
use SP\Patient;
use SP\PatientLit;
use SP\Prelevement;
use SP\Sall;
use SP\Service;
use SP\Soin;
use SP\Unite;
use SP\User;
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
    public function index($id_adm){
        $prelvs = Prelevement::where('prelevements.id_adm', $id_adm)
            ->leftJoin('admissions', 'admissions.id_adm', '=', 'prelevements.id_adm')
            ->leftJoin('patients', 'patients.id_patient', '=', 'admissions.id_patient')
            ->leftJoin('infirmiere', 'infirmiere.id_inf', '=', 'prelevements.id_inf')
            ->leftJoin('users as u_inf', 'u_inf.id', '=', 'infirmiere.id_user')
            ->select(
                'prelevements.*',
                'patients.*',
                'admissions.*',
                'infirmiere.*',
                'u_inf.name as name_inf'
            )
            ->get();
        return view('prelevement.index', ['prelevs' => $prelvs, 'id_adm'=>$id_adm]);
    }

    public function create($id_adm) {
        return view('prelevement.create', ['id_adm'=>$id_adm]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        if( $user ) {
            if( $user->type = User::INFERMIERE_TYPE ) {
                $inf = Infermiere::where('id_user', $user->id)->get()->first();
                $prelev = new Prelevement();
                $prelev->id_adm = $request->input('id_adm');
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
        return redirect('prelevement/'.$request->input('id_adm'));
    }

    public function edit($id_prel) {
        $prel = Prelevement::where('id_prel', $id_prel)->get()->first();
        return view('prelevement.edit', ['prel'=>$prel]);
    }

    public function update(Request $request) {
        $prel = Prelevement::where(self::TABLE.'.id_prel', $request->input('id_prel'));
        $id_adm = $prel->get()->first()->id_adm;
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
        return redirect('prelevement/'.$id_adm);
    }

    public function destroy($id_prel) {
        $prel = Prelevement::find($id_prel);
        $id_adm = $prel->get()->first()->id_adm;
        $prel->delete();
        return redirect('prelevement/'.$id_adm);
    }
}
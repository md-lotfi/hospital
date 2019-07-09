<?php


namespace SP\Http\Controllers;

use SP\PatientLit;
use Illuminate\Http\Request;

class PatientSearchController extends Controller
{
    //const ROUTE_ADMISSION = 'admission';
    const ROUTE_CONSIGNE = 'consigne';
    const ROUTE_ENREGISTRER_SOIN = 'en_soin';
    const ROUTE_ENREGISTRER_SOIN_MEDICAMENT = 'medic';
    const ROUTE_ENREGISTRER_SOIN_PSYCHOTROPE = 'psyco';
    const ROUTE_ENREGISTRER_SOIN_PRELEVEMENT = 'prelevement';
    const ROUTE_ENREGISTRER_SOIN_LIST_ALL = 'soinlistall';
    const ROUTE_SORTIE_PATIENT = 'sortie_patient';
    const ROUTE_PRESCRIRE = 'prescrire';

    public function index($action, $route){
        return view('psearch.search', ['route'=> $route, 'action'=>$action]);
    }

    private function getDetails($nom_salle, $nom_lit){
        return PatientLit::where('salls.nom_salle', $nom_salle)
            ->where('lits.nom_lit', $nom_lit)
            ->where('patient_lit.busy', PatientLit::LIT_BUSY)
            ->join('salls', 'salls.id_salle', 'patient_lit.id_salle')
            ->join('lits', 'lits.id_lit', 'patient_lit.id_lit')
            ->join('admissions', 'admissions.id_adm', 'patient_lit.id_adm')
            ->join('patients', 'patients.id_patient', 'admissions.id_patient')
            ->get()->first();
    }

    public function find(Request $request) {
        if( $exist = $this->getDetails($request->input('nom_salle'), $request->input('nom_lit')) ) {
            switch ($request->input('route')) {
                case self::ROUTE_CONSIGNE:
                    switch ($request->input('action')){
                        case 'add' : return redirect('/consigne/create/'.$exist->id_adm);
                        case 'consult' : return redirect('/consigne/'.$exist->id_adm);
                    }
                    break;
                case self::ROUTE_ENREGISTRER_SOIN_MEDICAMENT:
                    switch ($request->input('action')){
                        case 'add' : return redirect('/soins/create/'.$exist->id_adm);
                        case 'consult' : return redirect('/soin/'.$exist->id_adm);
                    }
                    break;
                case self::ROUTE_ENREGISTRER_SOIN_PSYCHOTROPE:
                    switch ($request->input('action')){
                        case 'add' : return redirect('/psychotrope/create/'.$exist->id_adm);
                        case 'consult' : return redirect('/psychotrope/'.$exist->id_adm);
                    }
                    break;
                case self::ROUTE_ENREGISTRER_SOIN_PRELEVEMENT:
                    switch ($request->input('action')){
                        case 'add' : return redirect('/prelevement/create/'.$exist->id_adm);
                        case 'consult' : return redirect('/prelevement/'.$exist->id_adm);
                    }
                    break;
                case self::ROUTE_ENREGISTRER_SOIN_LIST_ALL:
                    switch ($request->input('action')){
                        case 'consult' : return redirect('/soins/list/'.$exist->id_adm);
                    }
                    break;
                case self::ROUTE_PRESCRIRE:
                    switch ($request->input('action')){
                        case 'add' : return redirect('/ordonnances/'.$exist->id_adm);
                    }
                    break;
                case self::ROUTE_SORTIE_PATIENT:
                    switch ($request->input('action')){
                        case 'add' : return redirect('/patient/get/'.$exist->id_patient.'?state=es');
                    }
                    break;
            }
        }
        return back()->with('error', "Le lit ".$request->input('nom_lit')." dans la salle ".$request->input('nom_salle')." n'est pas trouver, il est peut être vide.");
    }

}
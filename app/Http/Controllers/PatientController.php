<?php

namespace SP\Http\Controllers;

use Illuminate\Http\Request;
use SP\Patient;
use SP\PatientLit;
use SP\User;

class PatientController extends Controller
{

    const VALIDATE_RULES_PATIENT = [
        'nom' => 'required|between:5,150',
        'prenom' => 'required|between:5,150',
        'datenai' => 'required|date',
    ];

    const VALIDATE_MESSAGE_PATIENT = [
        'nom.required' => 'Vous devez saisir le nom du patient',
        'prenom.required' => 'Vous devez saisir le prenom du patient',
        'datenai.required' => 'Vous devez saisir la date de naissance du patient',
        'nom.between' => 'Le nom doit ètre entre 5 et 15 charactères',
        'prenom.between' => 'Le prénom doit ètre entre 5 et 15 charactères',
    ];

    public function index() {
        $listpatient = Patient::all();
        return view('patient.index', ['patients' => $listpatient ]);
    }

    public function create() {
        return view('patient.create');
        
    }

    public function store(Request $request) {
        $request->validate(self::VALIDATE_RULES_PATIENT,self::VALIDATE_MESSAGE_PATIENT);

        $exist = Patient::where('nom', '=', $request->input('nom'))
            ->where('prenom', '=', $request->input('prenom'))
            ->where('datenai', '=', $request->input('datenai'))
            ->get()->first();

        if( !$exist ) {
            $patient = new Patient();

            $patient->nom = $request->input('nom');
            $patient->prenom = $request->input('prenom');
            $patient->datenai = $request->input('datenai');
            $patient->prenompere = $request->input('prenompere');
            $patient->nommere = $request->input('nommere');
            $patient->prenommere = $request->input('prenommere');
            $patient->adresse = $request->input('adresse');

            $patient->save();
            return response()->redirectTo('messages?redirect='.urldecode("/admission/create/".$patient->getKey()))
                ->with('success', "Patient ajouter avec succeé, vous allez ètre rediriger vers la page d'admission aprés 5 seconds...");
        }
        return response()->redirectTo('messages?redirect='.urldecode("/admission/create/$exist->id_patient"))
            ->with('warning', "Patient éxiste déja, vous allez ètre rediriger vers la page d'admission aprés 5 seconds...");
    }

    public function search(Request $request){
        $name = $request->input('name');
        $prenom = $request->input('prenom');
        $p = new Patient();
        if( !$name && !$prenom ){
            $p = Patient::all();
        }elseif( $name && !$prenom ) {
            $p = Patient::where('nom', 'like', '%'.$name.'%')
                ->get();
        }elseif( $prenom && !$name ) {
            $p = Patient::where('prenom', 'like', '%'.$prenom.'%')
                ->get();
        }elseif( $prenom && $name ) {
            $p = Patient::where('nom', 'like', '%'.$name.'%')
                ->where('prenom', 'like', '%'.$prenom.'%')
                ->get();
        }
        return view('patient.index', ['patients' => $p ]);
    }

    public function locate(Request $request){
        $nom_salle = $request->input('nom_salle');
        $nom_lit = $request->input('nom_lit');
        $p = new Patient();
        if( !$nom_salle && !$nom_lit ){
            $p = Patient::all();
        }elseif( $nom_salle && !$nom_lit ) {
            $p = PatientLit::where('salls.nom_salle', $nom_salle)
                ->join('salls', 'salls.id_salle', 'patient_lit.id_salle')
                ->join('lits', 'lits.id_lit', 'patient_lit.id_lit')
                ->join('admissions', 'admissions.id_adm', 'patient_lit.id_adm')
                ->join('patients', 'patients.id_patient', 'admissions.id_patient')
                ->get();
        }elseif( $nom_lit && !$nom_salle ) {
            $p = PatientLit::where('lits.nom_lit', $nom_lit)
                ->join('salls', 'salls.id_salle', 'patient_lit.id_salle')
                ->join('lits', 'lits.id_lit', 'patient_lit.id_lit')
                ->join('admissions', 'admissions.id_adm', 'patient_lit.id_adm')
                ->join('patients', 'patients.id_patient', 'admissions.id_patient')
                ->get();
        }elseif( $nom_salle && $nom_lit ) {
            PatientLit::where('salls.nom_salle', $nom_salle)
                ->where('lits.nom_lit', $nom_lit)
                ->join('salls', 'salls.id_salle', 'patient_lit.id_salle')
                ->join('lits', 'lits.id_lit', 'patient_lit.id_lit')
                ->join('admissions', 'admissions.id_adm', 'patient_lit.id_adm')
                ->join('patients', 'patients.id_patient', 'admissions.id_patient')
                ->get()->first();
        }
        return view('patient.index', ['patients' => $p ]);
    }

    public function edit($id_patient) {
        $patient = Patient::where('id_patient', $id_patient)->get()->first();
        return view('patient.edit', ['patient' => $patient ]);
    }

    public function update(Request $request) {
        $request->validate(self::VALIDATE_RULES_PATIENT,self::VALIDATE_MESSAGE_PATIENT);
        Patient::where('id_patient', $request->input('id_patient'))->update([
            'nom'=>$request->input('nom'),
            'prenom'=>$request->input('prenom'),
            'datenai'=>$request->input('datenai'),
            'prenompere'=>$request->input('prenompere'),
            'nommere'=>$request->input('nommere'),
            'prenommere'=>$request->input('prenommere'),
            'adresse'=>$request->input('adresse'),
        ]);
        return redirect('/patient');
    }

    public function get($id) {
        /*$id = Auth::user();
        var_dump($id);
        exit();*/
        $patient = Patient::where('patients.id_patient',$id)
            ->whereNull('gardem_adm.date_fin')
            //->where('patient_lit.busy', '=', PatientLit::LIT_FREE)
            ->leftJoin('admissions', 'patients.id_patient', '=', 'admissions.id_patient')
            ->leftJoin('patient_lit', 'admissions.id_adm', '=', 'patient_lit.id_adm')
            ->leftJoin('lits', 'lits.id_lit', '=', 'patient_lit.id_lit')
            ->leftJoin('salls', 'salls.id_salle', '=', 'lits.id_salle')
            ->leftJoin('unite', 'unite.id_unite', '=', 'salls.id_unite')
            ->leftJoin('services', 'services.id_service', '=', 'unite.id_service')
            ->leftJoin('gardem_adm', 'gardem_adm.id_adm', '=', 'admissions.id_adm')
            ->leftJoin('gardem', 'gardem.id_gardem', '=', 'gardem_adm.id_gardem')
            ->leftJoin('sortie_patient', 'sortie_patient.id_adm', '=', 'admissions.id_adm')
            ->select(
                'patients.*',
                'admissions.id_adm as id_admission',
                'admissions.motif',
                'admissions.diag',
                'admissions.date_adm',
                'patient_lit.*',
                'lits.*',
                'salls.*',
                'unite.*',
                'gardem.nom as nom_gardem',
                'gardem.prenom as prenom_gardem',
                'gardem_adm.date_debut as date_debut_gardem',
                'services.nom as nom_service',
                'sortie_patient.*'
            )
            ->groupBy('admissions.id_adm')
            //->orderBy('name', 'desc')
            ->get();
        if( count($patient) > 0 )
            return view('patient.details', ['patient' => $patient[0], 'admissions'=>$patient]);
        else
            return view('patient.details', ['patient' => new Patient(), 'admissions'=>null]);
    }

    public function destroy($id_patient) {
        $p = Patient::find($id_patient);
        $p->delete();
        return redirect('/patient');
    }
}
<?php

namespace SP\Http\Controllers;

use Illuminate\Http\Request;
use Knp\Snappy\Pdf;
use SP\Admission;
use SP\Analyse;
use SP\Patient;
use SP\PatientAnalyse;
use SP\PatientAnalyseMaster;
use SP\PatientLit;
use SP\PatientRadio;
use SP\Psychotrope;
use SP\Soin;
use SP\SortiePatient;
use SP\User;

class PatientController extends Controller
{

    const VALIDATE_RULES_PATIENT = [
        'nom' => 'required|between:4,150',
        'prenom' => 'required|between:4,150',
        'datenai' => 'required|date',
    ];

    const VALIDATE_MESSAGE_PATIENT = [
        'nom.required' => 'Vous devez saisir le nom du patient',
        'prenom.required' => 'Vous devez saisir le prenom du patient',
        'datenai.required' => 'Vous devez saisir la date de naissance du patient',
        'nom.between' => 'Le nom doit ètre entre 4 et 15 charactères',
        'prenom.between' => 'Le prénom doit ètre entre 4 et 15 charactères',
    ];

    public function index() {
        $listpatient = Patient::all()->sortByDesc('created_at');
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
                ->where('patient_lit.busy', PatientLit::LIT_BUSY)
                ->join('salls', 'salls.id_salle', 'patient_lit.id_salle')
                ->join('lits', 'lits.id_lit', 'patient_lit.id_lit')
                ->join('admissions', 'admissions.id_adm', 'patient_lit.id_adm')
                ->join('patients', 'patients.id_patient', 'admissions.id_patient')
                ->get();
        }elseif( $nom_lit && !$nom_salle ) {
            $p = PatientLit::where('lits.nom_lit', $nom_lit)
                ->where('patient_lit.busy', PatientLit::LIT_BUSY)
                ->join('salls', 'salls.id_salle', 'patient_lit.id_salle')
                ->join('lits', 'lits.id_lit', 'patient_lit.id_lit')
                ->join('admissions', 'admissions.id_adm', 'patient_lit.id_adm')
                ->join('patients', 'patients.id_patient', 'admissions.id_patient')
                ->get();
        }elseif( $nom_salle && $nom_lit ) {
            $p = PatientLit::where('salls.nom_salle', $nom_salle)
                ->where('lits.nom_lit', $nom_lit)
                ->where('patient_lit.busy', PatientLit::LIT_BUSY)
                ->join('salls', 'salls.id_salle', 'patient_lit.id_salle')
                ->join('lits', 'lits.id_lit', 'patient_lit.id_lit')
                ->join('admissions', 'admissions.id_adm', 'patient_lit.id_adm')
                ->join('patients', 'patients.id_patient', 'admissions.id_patient')
                ->get();
            //return view('patient.details', ['patients' => $p ]);
        }

        return view('patient.index', ['patients' => $p]);
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
        return redirect('/patient/get/'.$request->input('id_patient'));
    }

    /**
     * Page Détail patient
     * @param $id id_patient
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function get($id) {
        $patient = Patient::getPatientDetails($id);
        if( count($patient) > 0 ) {
            return view('patient.details', ['patient' => $patient[0], 'admissions' => $patient]);
        }else
            return view('patient.details', ['patient' => new Patient(), 'admissions'=>null]);
    }

    public function destroy($id_patient) {
        $p = Patient::find($id_patient);
        $p->delete();
        return redirect('/patient');
    }

    public function print($id_adm){
        $patient = Admission::getPatientAdm($id_adm);
        $lit = PatientLit::getInfo($id_adm);
        $sortie = SortiePatient::getSortie($id_adm);
        if( !$sortie )
            $sortie = new SortiePatient();
        $soin = Soin::getSoin($id_adm);
        if( !$soin )
            $soin = new Soin();
        $psy = Psychotrope::getPsychotropes($id_adm);
        if( !$psy )
            $psy = new Psychotrope();
        $analyses = PatientAnalyseMaster::getAnalyse($id_adm);
        $radios = PatientRadio::getRadio($id_adm);

        return \PDF::loadView('patient.print', [
            'patient'=>$patient,
            'position'=>$lit,
            'sortie'=>$sortie,
            'soins'=>$soin,
            'psys'=>$psy,
            'analyses'=>$analyses,
            'radios'=>$radios
        ])
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
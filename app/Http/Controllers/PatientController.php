<?php

namespace App\Http\Controllers;

use App\Admission;
use App\GardemAdm;
use Illuminate\Http\Request;
use App\Patient;

class PatientController extends Controller
{
    public function index() {
        $listpatient = Patient::all();
        return view('patient.index', ['patients' => $listpatient ]);
    }

    public function create() {
        return view('patient.create');
        
    }

    public function store(Request $request) {
        $patient = new Patient();

        $patient->nom = $request->input('nom');
        $patient->prenom = $request->input('prenom');
        $patient->datenai = $request->input('datenai');
        $patient->prenompere = $request->input('prenompere');
        $patient->nommere = $request->input('nommere');
        $patient->prenommere = $request->input('prenommere');
        $patient->adresse = $request->input('adresse');
        
        $patient->save();
        //return redirect('admission/create?idp='.$patient->getKey());
        return redirect('patient?idp='.$patient->getKey());
    }

    public function edit() {
        
    }

    public function update() {
    }

    public function get($id) {
        $patient = Patient::where('patients.id_patient',$id)
            ->whereNull('gardem_adm.date_fin')
            ->leftJoin('admissions', 'patients.id_patient', '=', 'admissions.id_patient')
            ->leftJoin('patient_lit', 'admissions.id_adm', '=', 'patient_lit.id_adm')
            ->leftJoin('lits', 'lits.id_lit', '=', 'patient_lit.id_lit')
            ->leftJoin('salls', 'salls.id_salle', '=', 'lits.id_salle')
            ->leftJoin('unite', 'unite.id_unite', '=', 'salls.id_unite')
            ->leftJoin('services', 'services.id_service', '=', 'unite.id_service')
            ->leftJoin('gardem_adm', 'gardem_adm.id_adm', '=', 'admissions.id_adm')
            ->leftJoin('gardem', 'gardem.id_gardem', '=', 'gardem_adm.id_gardem')
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
                'services.nom as nom_service'
            )
            //->orderBy('name', 'desc')
            ->get();
        if( count($patient) > 0 )
            return view('patient.details', ['patient' => $patient[0], 'admissions'=>$patient]);
        else
            return view('patient.details', ['patient' => new Patient(), 'admissions'=>null]);
    }

    public function destroy() {
        
    }
}
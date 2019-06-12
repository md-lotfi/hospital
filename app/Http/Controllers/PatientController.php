<?php

namespace App\Http\Controllers;

use App\Admission;
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
        echo 'je suis la';
        exit();
    }

    public function get($id) {
        $patient = Patient::where('patients.id_patient', $id)
            ->leftJoin('admissions', 'patients.id_patient', '=', 'admissions.id_patient')
            //->orderBy('name', 'desc')
            ->get();
        //var_dump($patient);
        //exit();
        //echo 'je suis la';
        if( count($patient) > 0 )
            return view('patient.details', ['patient' => $patient[0], 'admissions'=>$patient]);
        else
            return view('patient.details', ['patient' => new Patient(), 'admissions'=>null]);
    }

    public function destroy() {
        
    }
}

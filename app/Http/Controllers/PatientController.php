<?php

namespace App\Http\Controllers;

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

    public function destroy() {
        
    }
}

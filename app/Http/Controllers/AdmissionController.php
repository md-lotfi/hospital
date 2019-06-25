<?php

namespace SP\Http\Controllers;

use SP\Patient;
use Illuminate\Http\Request;
use SP\Admission;

class AdmissionController extends Controller
{
    public function index() {
    
    }

    public function create($id_patient) {
        return view('admission.create', ['id_patient'=>$id_patient]);
        
    }

    public function store(Request $request) {
        if ($request->has('id_patient')) {
            $admission = new Admission();
            $admission->id_patient = $request->input('id_patient');

            $admission->motif = $request->input('motif');
            $admission->diag = $request->input('diag');
            $admission->date_adm = $request->input('date_adm');

            $admission->save();

            //$p = Patient::where('id_patient', $request->input('id_patient'));
            return response()->redirectTo('messages?redirect='.urldecode('/patientlit/service/'.$admission->getKey()))
                ->with('success', "Admission enregistrer pour ce patient, Redirection vers la page service aprés 5 seconds...");
            //return redirect('/patientlit/service/'.$admission->getKey());
            //return redirect('patient/get/'.$admission->id_patient);
        }
        else
            throw new \Exception('Erreur, id patient manquant.'); 
        //return ('error');
        
    }

    public function edit() {
        
    }

    public function update() {
        
    }

    public function destroy() {
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admission;

class AdmissionController extends Controller
{
    public function index() {
    
    }

    public function create() {
        return view('admission.create');
        
    }

    public function store(Request $request) {
        if ($request->has('idpatient')) {
            $admission = new Admission();
            $admission->id_patient = $request->input('idpatient');

            $admission->motif = $request->input('motif');
            $admission->diag = $request->input('diag');
            $admission->date_adm = $request->input('date_adm');
            $admission->date_sort= $request->input('date_sort');
            $admission->etat_sort = $request->input('etat_sort');
            
            $admission->save();
            return redirect('salle/create?idadm='.$admission->getKey());
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

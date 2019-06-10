<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medecin;

class MedecinController extends Controller
{
    public function index() {
    
    }

    public function create() {
        return view('medecin.create');
        
    }

    public function store(Request $request) {
        $medecin = new Medecin();

        $medecin->Nom = $request->input('Nom');
        $medecin->Prenom = $request->input('Prenom');
        $medecin->Specialite = $request->input('Specialite');
        $medecin->Grade= $request->input('Grade');
        
        $medecin->save();
        

        
    }

    public function edit() {
        
    }

    public function update() {
        
    }

    public function destroy() {
        
    }
}

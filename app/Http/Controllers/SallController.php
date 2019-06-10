<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sall\App;

class SallController extends Controller
{
    public function index() {
    
    }

    public function create() {
        return view('salle.create');
        
    }

    public function store(Request $request) {
        if ($request->has('idadm')) {
            $salle = new Sall();
            $salle->id_patient = $request->input('idadm');

            $salle->numSalle = $request->input('numSalle');
           
            $salle->save();
        }
       
        else
            throw new \Exception('Erreur, id adm manquant.'); 
        //return ('error');
        
    }

    public function edit() {
        
    }

    public function update() {
        
    }

    public function destroy() {
        
    }
}

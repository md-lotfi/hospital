<?php

namespace SP\Http\Controllers;

use Illuminate\Http\Request;

use SP\Cv;

class CvController extends Controller
{
   //lister les cvs
   public function index() {

      $listcv = Cv::all();
      return view('cv.index', ['cv' => $listcv]);

   }

   //affiche le formulaie de cv
   public function create() {
     return view('cv.create');  
}

//enregistrer cv
   public function store(Request $request) {
     $cv = new Cv();
     $cv->titre = $request->input('titre');
     $cv->presentation = $request->input('presentation');
     
     $cv->save();
       
}
 
//récupérer un cv puis de le mettre dans le formulaie
   public function edit() {
       
}

//modifer
   public function update() {
       
}

//supprimer
   public function destroy() {
       
}
}

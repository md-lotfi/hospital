<?php

namespace SP\Http\Controllers;

use SP\Unite;
use Illuminate\Http\Request;
use SP\Service;

class UniteController extends Controller
{
    public function index($id_service) {
        $unites = Unite::where('unite.id_service', '=', $id_service)->get();
        return view('unite.index', ['unites' => $unites, 'id_service'=>$id_service]);
    }

    public function create($id_service) {
        return view('unite.create', ['id_service'=>$id_service]);
    }

    public function store(Request $request) {
        $unite = new Unite();
        $unite->id_service = $request->input('id_service');
        $unite->nom_unite = $request->input('nom_unite');
        $unite->save();
        return redirect('unite/'.$unite->id_service);
    }

    public function edit($id_unite) {
        $unite = Unite::find($id_unite);
        return view('unite.edit', ['unite' => $unite]);
    }

    public function update(Request $request) {
        $unite = Unite::where('unite.id_unite', $request->input('id_unite'))->update(['nom_unite' => $request->input('nom_unite')]);
        return redirect('unite/'.$request->input('id_service'));
    }

    public function destroy($id_unite) {
        $unite = Unite::find($id_unite);
        $id_service =  $unite->id_service;
        $unite->delete();
        return redirect('unite/'.$id_service);
    }
}

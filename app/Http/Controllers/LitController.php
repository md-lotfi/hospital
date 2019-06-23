<?php

namespace SP\Http\Controllers;

use SP\Lit;
use SP\Sall;
use Illuminate\Http\Request;

class LitController extends Controller
{
    const TABLE = 'lits';

    public function index($id_salle) {
        $lits = Lit::where(self::TABLE.'.id_salle', '=', $id_salle)->get();
        return view('lit.index', ['lits' => $lits, 'id_salle'=>$id_salle]);
    }

    public function create($id_salle) {
        return view('lit.create', ['id_salle'=>$id_salle]);
    }

    public function store(Request $request) {
        $lit = new Lit();
        $lit->id_salle = $request->input('id_salle');
        $lit->nom_lit = $request->input('nom_lit');
        $lit->save();
        return redirect('lit/'.$lit->id_salle);
    }

    public function edit($id_lit) {
        $lit = Lit::find($id_lit);
        return view('lit.edit', ['lit' => $lit]);
    }

    public function update(Request $request) {
        $lit = Lit::where(self::TABLE.'.id_lit', $request->input('id_lit'))->update(['nom_lit' => $request->input('nom_lit')]);
        return redirect('lit/'.$request->input('id_salle'));
    }

    public function destroy($id_lit) {
        $lit = Lit::find($id_lit);
        $id_salle =  $lit->id_salle;
        $lit->delete();
        return redirect('lit/'.$id_salle);
    }
}

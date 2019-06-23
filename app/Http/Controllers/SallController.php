<?php

namespace SP\Http\Controllers;

use SP\Sall;
use Illuminate\Http\Request;

class SallController extends Controller
{
    const TABLE = 'salls';

    public function index($id_unite) {
        $salles = Sall::where(self::TABLE.'.id_unite', '=', $id_unite)->get();
        return view('salle.index', ['salles' => $salles, 'id_unite'=>$id_unite]);
    }

    public function create($id_unite) {
        return view('salle.create', ['id_unite'=>$id_unite]);
    }

    public function store(Request $request) {
        $sall = new Sall();
        $sall->id_unite = $request->input('id_unite');
        $sall->nom_salle = $request->input('nom_salle');
        $sall->save();
        return redirect('salle/'.$sall->id_unite);
    }

    public function edit($id_salle) {
        $salle = Sall::find($id_salle);
        return view('salle.edit', ['salle' => $salle]);
    }

    public function update(Request $request) {
        $salle = Sall::where(self::TABLE.'.id_salle', $request->input('id_salle'))->update(['nom_salle' => $request->input('nom_salle')]);
        return redirect('salle/'.$request->input('id_unite'));
    }

    public function destroy($id_salle) {
        $salle = Sall::find($id_salle);
        $id_unite =  $salle->id_unite;
        $salle->delete();
        return redirect('salle/'.$id_unite);
    }
}

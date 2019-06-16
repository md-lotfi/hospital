<?php

namespace App\Http\Controllers;

use App\GardMalade;
use App\Infermiere;
use App\Sall;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class InfermiereController extends Controller
{
    const TABLE = 'infirmiere';

    public function index() {
        $infs = Infermiere::all();
        return view('infermiere.index', ['infs' => $infs]);
    }

    public function create() {
        return view('infermiere.create');
    }

    public function store(Request $request) {
        $inf = new Infermiere();
        $inf->nom_inf = $request->input('nom');
        $inf->prenom_inf = $request->input('prenom');
        $inf->adr_inf = $request->input('adr');
        $inf->tel_inf = $request->input('tel');
        $inf->save();
        return redirect('infermiere');
    }

    public function edit($id_inf) {
        $inf = Infermiere::find($id_inf);
        return view('infermiere.edit', ['inf' => $inf]);
    }

    public function update(Request $request) {
        Infermiere::where(self::TABLE.'.id_inf', $request->input('id_inf'))->update(
            [
                'nom_inf' => $request->input('nom'),
                'prenom_inf' => $request->input('prenom'),
                'adr_inf' => $request->input('adr'),
                'tel_inf' => $request->input('tel')
            ]
        );
        return redirect('infermiere');
    }

    public function destroy($id_inf) {
        $inf = Infermiere::find($id_inf);
        $inf->delete();
        return redirect('infermiere');
    }
}
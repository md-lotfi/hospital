<?php

namespace SP\Http\Controllers;

use SP\Analyse;
use SP\Medicaments;
use Illuminate\Http\Request;

class AnalyseController extends Controller
{
    const TABLE = 'analyses';

    public function index() {
        $anals = Analyse::all();
        return view('analyse.index', ['analyses' => $anals]);
    }

    public function create() {
        return view('analyse.create');
    }

    public function store(Request $request) {
        $anal = new Analyse();
        $anal->nom_analyse = $request->input('nom_analyse');
        $anal->norm_analyse = $request->input('norm_analyse');
        $anal->unite_analyse = $request->input('unite_analyse');
        $anal->save();
        return redirect('analyse');
    }

    public function edit($id_analyse) {
        $anal = Analyse::find($id_analyse);
        return view('analyse.edit', ['analyse' => $anal]);
    }

    public function update(Request $request) {
        Analyse::where(self::TABLE.'.id_analyse', $request->input('id_analyse'))->update(
            [
                'nom_analyse' => $request->input('nom_analyse'),
                'norm_analyse' => $request->input('norm_analyse'),
                'unite_analyse' => $request->input('unite_analyse')
            ]
        );
        return redirect('analyse');
    }

    public function destroy($id_analyse) {
        $anal = Analyse::find($id_analyse);
        $anal->delete();
        return redirect('analyse');
    }
}
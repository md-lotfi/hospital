<?php

namespace App\Http\Controllers;

use App\GardMalade;
use App\Infermiere;
use App\Medicaments;
use App\Sall;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class MedicamentController extends Controller
{
    const TABLE = 'medicaments';

    public function index() {
        $medics = Medicaments::all();
        return view('medicament.index', ['medics' => $medics]);
    }

    public function create() {
        return view('medicament.create');
    }

    public function store(Request $request) {
        $medic = new Medicaments();
        $medic->nom_medic = $request->input('nom_medic');
        $medic->dose_medic = $request->input('dose_medic');
        $medic->save();
        return redirect('medicament');
    }

    public function edit($id_medic) {
        $medic = Medicaments::find($id_medic);
        return view('medicament.edit', ['medic' => $medic]);
    }

    public function update(Request $request) {
        Medicaments::where(self::TABLE.'.id_medic', $request->input('id_medic'))->update(
            [
                'nom_medic' => $request->input('nom_medic'),
                'dose_medic' => $request->input('dose_medic')
            ]
        );
        return redirect('medicament');
    }

    public function destroy($id_medic) {
        $medic = Medicaments::find($id_medic);
        $medic->delete();
        return redirect('medicament');
    }
}
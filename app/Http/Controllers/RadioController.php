<?php

namespace SP\Http\Controllers;

use SP\GardMalade;
use SP\Infermiere;
use SP\Medicaments;
use SP\Radio;
use SP\Sall;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class RadioController extends Controller
{
    const TABLE = 'radios';

    public function index() {
        $radios = Radio::all();
        return view('radio.index', ['radios' => $radios]);
    }

    public function create() {
        return view('radio.create');
    }

    public function store(Request $request) {
        $radio = new Radio();
        $radio->nom_radio = $request->input('nom_radio');
        $radio->save();
        return redirect('radio');
    }

    public function edit($id_radio) {
        $radio = Radio::find($id_radio);
        return view('radio.edit', ['radio' => $radio]);
    }

    public function update(Request $request) {
        Radio::where(self::TABLE.'.id_radio', $request->input('id_radio'))->update(
            [
                'nom_radio' => $request->input('nom_radio')
            ]
        );
        return redirect('radio');
    }

    public function destroy($id_radio) {
        $radio = Medicaments::find($id_radio);
        $radio->delete();
        return redirect('radio');
    }
}
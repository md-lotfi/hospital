<?php

namespace SP\Http\Controllers;

use SP\GardMalade;
use SP\Sall;
use Illuminate\Http\Request;

class GardeMaladeController extends Controller
{
    const TABLE = 'gardem';
    const VALIDATOR = [
        'nom' => 'required|between:3,150',
        'prenom' => 'required|between:3,150',
    ];

    const MESSAGES = [
        'nom.required' => 'Vous devez saisir le nom du patient',
        'prenom.required' => 'Vous devez saisir le prenom du patient',
        'nom.between' => 'Le nom doit ètre entre 3 et 15 charactères',
        'prenom.between' => 'Le prénom doit ètre entre 3 et 15 charactères'
    ];

    public function index() {
        $gardems = GardMalade::all();
        return view('gardem.index', ['gardems' => $gardems]);
    }

    public function create() {
        return view('gardem.create');
    }

    public function store(Request $request) {
        $request->validate(self::VALIDATOR, self::MESSAGES);
        $gm = new GardMalade();
        $gm->nom = $request->input('nom');
        $gm->prenom = $request->input('prenom');
        $gm->lien_parent = $request->input('lien_parent');
        $gm->adr = $request->input('adr');
        $gm->tel = $request->input('tel');
        $gm->save();
        return redirect('gardem');
    }

    public function edit($id_gardem) {
        $gardem = GardMalade::find($id_gardem);
        return view('gardem.edit', ['gardem' => $gardem]);
    }

    public function update(Request $request) {
        $request->validate(self::VALIDATOR, self::MESSAGES);
        $gardem = GardMalade::where(self::TABLE.'.id_gardem', $request->input('id_gardem'))->update(
            [
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'lien_parent' => $request->input('lien_parent'),
                'adr' => $request->input('adr'),
                'tel' => $request->input('tel')
            ]
        );
        return redirect('gardem');
    }

    public function destroy($id_gardem) {
        $gardem = GardMalade::find($id_gardem);
        $gardem->delete();
        return redirect('gardem');
    }
}
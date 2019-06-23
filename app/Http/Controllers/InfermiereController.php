<?php

namespace SP\Http\Controllers;

use SP\GardMalade;
use SP\Infermiere;
use SP\Sall;
use SP\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $user = new User();
        $user->password = Hash::make($request->input('password'));
        $user->email = $request->input('email');
        $user->name = $request->input('nom');
        $user->type = User::INFERMIERE_TYPE;
        $user->save();
        if( $user ) {
            $inf = new Infermiere();
            $inf->id_user = $user->getKey();
            $inf->prenom_inf = $request->input('prenom');
            $inf->adr_inf = $request->input('adr');
            $inf->tel_inf = $request->input('tel');
            $inf->save();
            return redirect('infermiere');
        }
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
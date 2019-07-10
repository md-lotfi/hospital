<?php

namespace SP\Http\Controllers;

use SP\GardMalade;
use SP\Infermiere;
use SP\Sall;
use SP\Secretaire;
use SP\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\In;

class SecretaireController extends Controller
{
    const TABLE = 'secretaire';

    public function index() {
        $secs = Secretaire::select('secretaire.*', 'users.*')
            ->join('users', 'users.id', 'secretaire.id_user')
            ->get();
        return view('secretaire.index', ['secs' => $secs]);
    }

    public function create() {
        return view('secretaire.create');
    }

    /**
     * Ajoute une nouveau secretaire
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        $user = new User();
        $user->password = Hash::make($request->input('password'));
        $user->email = $request->input('email');
        $user->name = $request->input('nom');
        $user->type = User::SECRETAIRE_TYPE;
        $user->save();
        if( $user ) {
            $sec = new Secretaire();
            $sec->id_user = $user->getKey();
            $sec->prenom_sec = $request->input('prenom');
            $sec->adr_sec = $request->input('adr');
            $sec->tel_sec = $request->input('tel');
            $sec->save();
            return redirect('secretaire');
        }
    }

    public function edit($id_sec) {
        $sec = Secretaire::find($id_sec);
        $user = User::where('id', $sec->id_user)->get()->first();
        return view('secretaire.edit', ['sec' => $sec, 'user'=>$user]);
    }

    public function update(Request $request) {
        $sec = Secretaire::where(self::TABLE.'.id_sec', $request->input('id_sec'));
        $id_user = $sec->get()->first()->id_user;
        $sec->update(
            [
                //'nom_sec' => $request->input('nom'),
                'prenom_sec' => $request->input('prenom'),
                'adr_sec' => $request->input('adr'),
                'tel_sec' => $request->input('tel')
            ]
        );
        User::where('id', $id_user)->update(
            [
                'name' => $request->input('nom'),
            ]
        );
        return redirect('secretaire');
    }

    public function destroy($id_sec) {
        $sec = Secretaire::find($id_sec);
        $sec->delete();
        return redirect('secretaire');
    }
}
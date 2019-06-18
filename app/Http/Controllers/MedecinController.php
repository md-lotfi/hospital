<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Medecin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MedecinController extends Controller
{
    const TABLE = 'medecin';

    public function index() {
        $meds = DB::table(self::TABLE)->join('users', 'users.id', '=', 'medecin.id_user')->get();
        return view('medecin.index', ['meds' => $meds]);
    }

    public function create() {
        return view('medecin.create');
    }

    public function store(Request $request) {
        $user = new User();
        $user->password = Hash::make($request->input('password'));
        $user->email = $request->input('email');
        $user->name = $request->input('nom');
        $user->type = User::MEDECIN_TYPE;
        $user->save();
        if( $user ) {
            $medecin = new Medecin();
            $medecin->id_user = $user->getKey();
            $medecin->prenom_med = $request->input('prenom');
            $medecin->spec_med = $request->input('spec_med');
            $medecin->grade_med = $request->input('grade_med');
            $medecin->tel_med = $request->input('tel');
            $medecin->adr_med = $request->input('adr');
            $medecin->save();
            return redirect('medecin');
        }
    }

    public function edit($id_inf) {
        $med = Medecin::where('id_med', $id_inf)->join('users', 'users.id', '=', 'medecin.id_user')->get()->first();
        return view('medecin.edit', ['med' => $med]);
    }

    public function update(Request $request) {
        $med = Medecin::where(self::TABLE.'.id_med', $request->input('id_med'))->get()->first();
        $id_user = $med->id_user;
        $med->update(
            [
                //'nom_med' => $request->input('nom_med'),
                'prenom_med' => $request->input('prenom'),
                'adr_med' => $request->input('adr'),
                'tel_med' => $request->input('tel'),
                'spec_med' => $request->input('spec_med'),
                'grade_med' => $request->input('grade_med')
            ]
        );
        $user = User::where('users.id', $id_user);
        $user->update(['name'=>$request->input('nom')]);

        return redirect('medecin');
    }

    public function destroy($id_med) {
        $med = Medecin::find($id_med);
        $med->delete();
        return redirect('medecin');
    }
}

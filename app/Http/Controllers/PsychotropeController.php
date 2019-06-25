<?php

namespace SP\Http\Controllers;

use SP\Infermiere;
use SP\Medecin;
use SP\Medicaments;
use SP\Psychotrope;
use SP\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PsychotropeController extends Controller
{
    const TABLE = 'psychtropes';

    /**
     * Afficher les soins des patients déja enregistrer
     * @param $id_patient
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id_adm){
        $psys = Psychotrope::where(self::TABLE.'.id_adm', $id_adm)
            ->leftJoin('admissions', 'admissions.id_adm', '=', self::TABLE.'.id_adm')
            ->leftJoin('patients', 'patients.id_patient', '=', 'admissions.id_patient')
            ->leftJoin('infirmiere', 'infirmiere.id_inf', '=', self::TABLE.'.id_inf')
            ->leftJoin('medecin', 'medecin.id_med', '=', self::TABLE.'.id_med')
            ->leftJoin('users as u_inf', 'u_inf.id', '=', 'infirmiere.id_user')
            ->leftJoin('users as u_med', 'u_med.id', '=', 'medecin.id_user')
            ->select(
                'patients.*',
                'admissions.*',
                'infirmiere.*',
                'medecin.*',
                'u_inf.name as name_inf',
                'u_med.name as name_med'
            )
            ->get();
        return view('psychotrope.index', ['psys' => $psys, 'id_adm'=>$id_adm]);
    }

    public function create($id_adm) {
        $meds = Medecin::all();
        return view('psychotrope.create', ['meds'=>$meds, 'id_adm'=>$id_adm]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        if( $user ) {
            if( $user->type = User::INFERMIERE_TYPE ) {
                $inf = Infermiere::where('id_user', $user->id)->get()->first();
                $ps = new Psychotrope();
                $ps->id_adm = $request->input('id_adm');
                $ps->id_inf = $inf->id_inf;
                $ps->id_med = $request->input('id_med');
                $ps->nom_psy = $request->input('nom_psy');
                $ps->mat_psy = $request->input('mat_psy');
                $ps->save();
            }
        }
        return redirect('psychotrope/'.$request->input('id_adm'));
    }

    public function edit($id_psy) {
        $psy = Psychotrope::where('id_psy', $id_psy)->get()->first();
        $meds = Medecin::all();
        return view('psychotrope.edit', ['psy'=>$psy, 'meds'=>$meds]);
    }

    public function update(Request $request) {
        $psy = Psychotrope::where(self::TABLE.'.id_psy', $request->input('id_psy'));
        $id_adm = $psy->get()->first()->id_adm;
        $psy->update(
            [
                'id_med' => $request->input('id_med'),
                'nom_psy' => $request->input('nom_psy'),
                'mat_psy' => $request->input('mat_psy')
            ]
        );
        return redirect('psychotrope/'.$id_adm);
    }

    public function destroy($id_psy) {
        $psy = Psychotrope::find($id_psy);
        $id_adm = $psy->get()->first()->id_adm;
        $psy->delete();
        return redirect('psychotrope/'.$id_adm);
    }
}
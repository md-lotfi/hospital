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
    public function index($id_patient){
        $psys = Psychotrope::where(self::TABLE.'.id_patient', $id_patient)
            ->leftJoin('patients', 'patients.id_patient', '=', self::TABLE.'.id_patient')
            ->leftJoin('infirmiere', 'infirmiere.id_inf', '=', self::TABLE.'.id_inf')
            ->leftJoin('medecin', 'medecin.id_med', '=', self::TABLE.'.id_med')
            ->leftJoin('users as u_inf', 'u_inf.id', '=', 'infirmiere.id_user')
            ->leftJoin('users as u_med', 'u_med.id', '=', 'medecin.id_user')
            ->select(
                'patients.*',
                'infirmiere.*',
                'medecin.*',
                'u_inf.name as name_inf',
                'u_med.name as name_med'
            )
            ->get();
        return view('psychotrope.index', ['psys' => $psys, 'id_patient'=>$id_patient]);
    }

    public function create($id_patient) {
        $meds = Medecin::all();
        return view('psychotrope.create', ['meds'=>$meds, 'id_patient'=>$id_patient]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        if( $user ) {
            if( $user->type = User::INFERMIERE_TYPE ) {
                $inf = Infermiere::where('id_user', $user->id)->get()->first();
                $ps = new Psychotrope();
                $ps->id_patient = $request->input('id_patient');
                $ps->id_inf = $inf->id_inf;
                $ps->id_med = $request->input('id_med');
                $ps->nom_psy = $request->input('nom_psy');
                $ps->mat_psy = $request->input('mat_psy');
                $ps->save();
            }
        }
        return redirect('psychotrope/'.$request->input('id_patient'));
    }

    public function edit($id_psy) {
        $psy = Psychotrope::where('id_psy', $id_psy)->get()->first();
        $meds = Medecin::all();
        return view('psychotrope.edit', ['psy'=>$psy, 'meds'=>$meds]);
    }

    public function update(Request $request) {
        $psy = Psychotrope::where(self::TABLE.'.id_psy', $request->input('id_psy'));
        $id_patient = $psy->get()->first()->id_patient;
        $psy->update(
            [
                'id_med' => $request->input('id_med'),
                'nom_psy' => $request->input('nom_psy'),
                'mat_psy' => $request->input('mat_psy')
            ]
        );
        return redirect('psychotrope/'.$id_patient);
    }

    public function destroy($id_soin) {
        $psy = Psychotrope::find($id_soin);
        $id_patient = $psy->get()->first()->id_patient;
        $psy->delete();
        return redirect('psychotrope/'.$id_patient);
    }
}
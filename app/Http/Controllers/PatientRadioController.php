<?php

namespace SP\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use SP\Admission;
use SP\Analyse;
use Illuminate\Http\Request;
use SP\Medecin;
use SP\Patient;
use SP\PatientAnalyse;
use SP\PatientRadio;
use SP\Radio;
use SP\User;

class PatientRadioController extends Controller
{
    const TABLE = 'patient_radios';
    const VIEW = 'patient_radio';

    public function index($id_adm) {
        $rads = PatientRadio::where('id_adm', $id_adm)
            ->join('radios', 'radios.id_radio', 'patient_radios.id_radio')
            ->get();
        $patient = Admission::getPatientAdm($id_adm);
        $age = null;
        if( $patient )
            $age = Patient::getAge($patient->datenai);
        return view(self::VIEW.".index", ['radios' => $rads, 'patient'=>$patient, 'age'=>$age, 'id_adm'=>$id_adm]);
    }

    public function create($id_adm) {
        $rads = Radio::all();
        return view(self::VIEW.'.create', ['radios' => $rads, 'id_adm'=>$id_adm]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        if( $user ) {
            if ($user->type === User::MEDECIN_TYPE) {
                $med = Medecin::where('id_user', $user->id)->get()->first();
                $rad = new PatientRadio();
                $rad->id_radio = $request->input('id_radio');
                $rad->id_med = $med->id_med;
                $rad->id_adm = $request->input('id_adm');
                $rad->results = $request->input('results');
                $rad->save();
                return redirect('/radio/patient/index/' . $request->input('id_adm'));
            }
        }
    }

    public function edit($id_pr) {
        $pr = PatientRadio::find($id_pr);
        $radios = Radio::all();
        return view(self::VIEW.'.edit', ['radios'=>$radios, 'pr' => $pr]);
    }

    public function update(Request $request) {
        PatientRadio::where(self::TABLE.'.id_pr', $request->input('id_pr'))->update(
            [
                'id_radio' => $request->input('id_radio'),
                'results' => $request->input('results')
            ]
        );
        return redirect('/radio/patient/index/'.$request->input('id_adm'));
    }

    public function destroy($id_pa) {
        $pr = PatientRadio::find($id_pa);
        $id_adm = $pr->id_adm;
        $pr->delete();
        return redirect('/radio/patient/index/'.$id_adm);
    }
}
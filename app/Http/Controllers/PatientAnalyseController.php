<?php

namespace SP\Http\Controllers;

use SP\Admission;
use SP\Analyse;
use Illuminate\Http\Request;
use SP\Patient;
use SP\PatientAnalyse;

class PatientAnalyseController extends Controller
{
    const TABLE = 'patient_analyses';
    const VIEW = 'patient_analyse';

    public function index($id_adm) {
        $anals = PatientAnalyse::where('id_adm', $id_adm)
            ->join('analyses', 'analyses.id_analyse', 'patient_analyses.id_analyse')
            ->get();
        $patient = Admission::getPatientAdm($id_adm);
        $age = null;
        if( $patient )
            $age = Patient::getAge($patient->datenai);
        return view(self::VIEW.".index", ['analyses' => $anals, 'patient'=>$patient, 'age'=>$age, 'id_adm'=>$id_adm]);
    }

    public function create($id_adm) {
        $anals = Analyse::all();
        return view(self::VIEW.'.create', ['analyses' => $anals, 'id_adm'=>$id_adm]);
    }

    public function store(Request $request) {
        $anal = new PatientAnalyse();
        $anal->id_analyse = $request->input('id_analyse');
        $anal->id_adm = $request->input('id_adm');
        $anal->results = $request->input('results');
        $anal->save();
        return redirect('/analyse/patient/index/'.$request->input('id_adm'));
    }

    public function edit($id_pa) {
        $ap = PatientAnalyse::find($id_pa);
        $anals = Analyse::all();
        return view(self::VIEW.'.edit', ['analyses' => $anals, 'ap'=>$ap]);
    }

    public function update(Request $request) {
        PatientAnalyse::where(self::TABLE.'.id_pa', $request->input('id_pa'))->update(
            [
                'id_analyse' => $request->input('id_analyse'),
                'results' => $request->input('results')
            ]
        );
        return redirect('/analyse/patient/index/'.$request->input('id_adm'));
    }

    public function destroy($id_pa) {
        $anal = PatientAnalyse::find($id_pa);
        $id_adm = $anal->id_adm;
        $anal->delete();
        return redirect('/analyse/patient/index/'.$id_adm);
    }
}
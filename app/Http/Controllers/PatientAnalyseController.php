<?php

namespace SP\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use SP\Admission;
use SP\Analyse;
use Illuminate\Http\Request;
use SP\Medecin;
use SP\Patient;
use SP\PatientAnalyse;
use SP\PatientAnalyseMaster;
use SP\User;

class PatientAnalyseController extends Controller
{
    const TABLE = 'patient_analyses';
    const VIEW = 'patient_analyse';

    public function index($id_pam) {
        $anals = PatientAnalyse::where(self::TABLE.'.id_pam', $id_pam)
            ->leftJoin('analyses', 'analyses.id_analyse', 'patient_analyses.id_analyse')
            ->join('patient_analyses_master', 'patient_analyses_master.id_pam', 'patient_analyses.id_pam')
            ->get();
        $id_adm = $anals->first()->id_adm;
        $patient = Admission::getPatientAdm($id_adm);
        $age = null;
        if( $patient )
            $age = Patient::getAge($patient->datenai);
        return view(self::VIEW.".index", ['analyses' => $anals, 'patient'=>$patient, 'age'=>$age, 'id_adm'=>$id_adm, 'id_pam'=>$id_pam]);
    }

    public function create($id_pam) {
        $anals = Analyse::all();
        return view(self::VIEW.'.create', ['analyses' => $anals, 'id_pam'=>$id_pam]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            if ($user->type === User::MEDECIN_TYPE) {
                $med = Medecin::where('id_user', $user->id)->get()->first();
                $anal = new PatientAnalyse();
                $anal->id_analyse = $request->input('id_analyse');
                $anal->id_pam = $request->input('id_pam');
                $anal->results = $request->input('results');
                $anal->save();
                return redirect('/analyse/patient/index/' . $request->input('id_pam'));
            }
        }
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
        return redirect('/analyse/patient/index/'.$request->input('id_pam'));
    }

    public function destroy($id_pa) {
        $anal = PatientAnalyse::find($id_pa);
        $id_pam = $anal->id_pam;
        $anal->delete();
        return redirect('/analyse/patient/index/'.$id_pam);
    }
}
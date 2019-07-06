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

class PatientAnalyseMasterController extends Controller
{
    const TABLE = 'patient_analyses_master';
    const VIEW = 'patient_analyse_master';

    public function index($id_adm) {
        $anals = PatientAnalyseMaster::where('id_adm', $id_adm)->get();
        $patient = Admission::getPatientAdm($id_adm);
        $age = null;
        if( $patient )
            $age = Patient::getAge($patient->datenai);
        return view(self::VIEW.".index", ['analyses' => $anals, 'patient'=>$patient, 'age'=>$age, 'id_adm'=>$id_adm]);
    }

    public function create($id_adm) {
        return view(self::VIEW.'.create', ['id_adm'=>$id_adm]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            if ($user->type === User::MEDECIN_TYPE) {
                $med = Medecin::where('id_user', $user->id)->get()->first();
                $anal = new PatientAnalyseMaster();
                $anal->id_med = $med->id_med;
                $anal->id_adm = $request->input('id_adm');
                $anal->observation = $request->input('observation');
                $anal->save();
                return redirect('/analyse/patient/master/index/' . $request->input('id_adm'));
            }
        }
    }

    public function edit($id_pam) {
        $ap = PatientAnalyseMaster::find($id_pam);
        return view(self::VIEW.'.edit', ['ap'=>$ap]);
    }

    public function update(Request $request) {
        PatientAnalyseMaster::where(self::TABLE.'.id_pam', $request->input('id_pam'))->update(
            [
                'observation' => $request->input('observation')
            ]
        );
        return redirect('/analyse/patient/master/index/'.$request->input('id_adm'));
    }

    public function destroy($id_pam) {
        $anal = PatientAnalyseMaster::find($id_pam);
        $id_adm = $anal->id_adm;
        $anal->delete();
        return redirect('/analyse/patient/master/index/'.$id_adm);
    }
}
<?php

namespace SP\Http\Controllers;

use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use SP\Admission;
use SP\Analyse;
use SP\Medecin;
use SP\Medicaments;
use Illuminate\Http\Request;
use SP\Patient;
use SP\PatientAnalyse;
use SP\PatientAnalyseMaster;
use SP\PatientLit;
use SP\PatientRadio;

class AnalyseController extends Controller
{
    const TABLE = 'analyses';

    public function index() {
        $anals = Analyse::all();
        return view('analyse.index', ['analyses' => $anals]);
    }

    public function create() {
        return view('analyse.create');
    }

    public function store(Request $request) {
        $anal = new Analyse();
        $anal->nom_analyse = $request->input('nom_analyse');
        $anal->norm_analyse = $request->input('norm_analyse');
        $anal->unite_analyse = $request->input('unite_analyse');
        $anal->save();
        return redirect('analyse');
    }

    public function edit($id_analyse) {
        $anal = Analyse::find($id_analyse);
        return view('analyse.edit', ['analyse' => $anal]);
    }

    public function update(Request $request) {
        Analyse::where(self::TABLE.'.id_analyse', $request->input('id_analyse'))->update(
            [
                'nom_analyse' => $request->input('nom_analyse'),
                'norm_analyse' => $request->input('norm_analyse'),
                'unite_analyse' => $request->input('unite_analyse')
            ]
        );
        return redirect('analyse');
    }

    public function destroy($id_analyse) {
        $anal = Analyse::find($id_analyse);
        $anal->delete();
        return redirect('analyse');
    }

    public function print($id_pam){
        $analyse = PatientAnalyseMaster::where('patient_analyses_master.id_pam', $id_pam)->get()->first();
        $analyses = PatientAnalyse::where('patient_analyses.id_pam', $id_pam)
            ->join('analyses', 'analyses.id_analyse', 'patient_analyses.id_analyse')
            ->get();
        $doctor = Medecin::getFull($analyse->id_med);
        $age = null;
        $patient = Admission::getPatientAdm($analyse->id_adm);

        $lit = PatientLit::getInfo($analyse->id_adm);

        if($patient){
            $id_adm = $patient->id_adm;
            $age = Patient::getAge($patient->datenai);
        }
        return PDF::loadView('analyse.print', ['patient'=> $patient, 'age'=>$age, 'analyse'=>$analyse, 'analyses'=>$analyses, 'lit'=> $lit, 'doctor'=>$doctor])
            ->setPaper('a4')
            /*->setOption('page-width', '116.9')
            ->setOption('page-height', '139.7')*/
            ->setOrientation('portrait')
            ->setOption('margin-bottom', 2)
            ->setOption('margin-top', 5)
            ->setOption('margin-right', 2)
            ->setOption('margin-left', 2)
            ->inline();
    }
}
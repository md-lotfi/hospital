<?php

namespace SP\Http\Controllers;

use SP\Patient;
use Illuminate\Http\Request;
use SP\Admission;
use SP\PatientLit;

class AdmissionController extends Controller
{
    public function index($id_patient) {
        $adms = Admission::getPatientAdmAll($id_patient);
        return view('admission.index', ['id_patient'=>$id_patient, 'adms'=>$adms]);
    }

    public function create($id_patient) {
        $adms = Admission::where('id_patient', $id_patient)->get();
        $has_adms = false;
        if( $adms )
            if( $adms->count() > 0 )
                $has_adms = true;
        return view('admission.create', ['id_patient'=>$id_patient, 'has_adms'=>$has_adms]);
        
    }

    public function store(Request $request) {
        if ($request->has('id_patient')) {
            $admission = new Admission();
            $admission->id_patient = $request->input('id_patient');

            $admission->motif = $request->input('motif');
            $admission->diag = $request->input('diag');
            $admission->date_adm = $request->input('date_adm');

            $admission->save();

            //$p = Patient::where('id_patient', $request->input('id_patient'));
            return response()->redirectTo('messages?redirect='.urldecode('/patientlit/service/'.$admission->getKey()))
                ->with('success', "Admission enregistrer pour ce patient, Redirection vers la page service aprés 5 seconds...");
            //return redirect('/patientlit/service/'.$admission->getKey());
            //return redirect('patient/get/'.$admission->id_patient);
        }
        else
            throw new \Exception('Erreur, id patient manquant.'); 
        //return ('error');
        
    }

    public function edit($id_adm) {
        $patient = Admission::getPatientAdm($id_adm);
        $lit = PatientLit::getInfo($id_adm);
        if( empty($lit) )
            $lit = new PatientLit();
        return view('admission.edit', ['admission' => $patient, 'lit'=>$lit]);
    }

    public function update(Request $request) {
        //$request->validate(self::VALIDATE_RULES_PATIENT,self::VALIDATE_MESSAGE_PATIENT);
        Admission::where('id_adm', $request->input('id_adm'))->update([
            'motif'=>$request->input('motif'),
            'diag'=>$request->input('diag'),
            'date_adm'=>$request->input('date_adm')
        ]);
        return redirect('/patient/get/'.$request->input('id_patient'));
    }

    public function destroy($id_adm) {
        $admission = Admission::where('id_adm', $id_adm);
        $id_patient = $admission->get()->first()->id_patient;
        $admission->delete();
        return redirect('/patient/get/'.$id_patient);
    }
}

<?php

namespace SP\Http\Controllers;

use Illuminate\Support\Facades\App;
use SP\Admission;
use SP\Infermiere;
use SP\Lit;
use SP\Medecin;
use SP\Medicaments;
use SP\Ordonnance;
use SP\OrdonnanceMedic;
use SP\Patient;
use SP\PatientAnalyse;
use SP\PatientAnalyseMaster;
use SP\PatientRadio;
use SP\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class OrdonnanceController extends Controller
{
    const TABLE = 'ordonnances';

    /**
     * Afficher les soins des patients déja enregistrer
     * @param $id_patient
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id_adm){
        $ord = Ordonnance::where(self::TABLE.'.id_adm', $id_adm)
            //->join('ordonnances_medic', 'ordonnances_medic.id_ord', 'ordonnances.id_ord')
            ->join('medecin', 'medecin.id_med', 'ordonnances.id_med')
            ->join('admissions', 'admissions.id_adm', 'ordonnances.id_adm')
            ->join('users', 'users.id', 'medecin.id_user')
            ->join('patients', 'patients.id_patient', 'admissions.id_patient')
            ->get();
        $rads = PatientRadio::where('id_adm', $id_adm)
            ->join('radios', 'radios.id_radio', 'patient_radios.id_radio')
            ->get();
        $anals = PatientAnalyseMaster::where('id_adm', $id_adm)->get();
        $age = null;
        $patient = Admission::getPatientAdm($id_adm);
        if( $patient )
            $age = Patient::getAge($patient->datenai);
        return view('ordonnance.index', ['patient'=> $patient, 'age'=>$age, 'ords'=>$ord, 'analyses' => $anals, 'radios' => $rads, 'id_adm'=>$id_adm]);
    }

    public function create($id_adm) {
        return view('ordonnance.create', ['id_adm'=>$id_adm]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        if( $user ) {
            if( $user->type === User::MEDECIN_TYPE ) {
                $med = Medecin::where('id_user', $user->id)->get()->first();
                $ord = new Ordonnance();
                $ord->id_adm = $request->input('id_adm');
                $ord->id_med = $med->id_med;
                $ord->observation = $request->input('observation') ? $request->input('observation') : '';
                $ord->save();
                return redirect('/ordonnances/medic/add/'.$ord->getKey().'/'.$request->input('id_adm'));
            }
        }
    }

    public function edit($id_ord) {
        $ord = Ordonnance::where('id_ord', $id_ord)->get()->first();
        return view('ordonnance.edit', ['ord'=>$ord]);
    }

    public function update(Request $request) {
        $ord = Ordonnance::where(self::TABLE.'.id_ord', $request->input('id_ord'));
        $id_adm = $ord->get()->first()->id_adm;
        $ord->update(
            [
                'observation' => $request->input('observation')
            ]
        );
        return redirect('ordonnances/'.$id_adm);
    }

    public function destroy($id_ord) {
        $ord = Ordonnance::where('id_ord', $id_ord);
        $id_adm = $ord->get()->first()->id_adm;
        $ord->delete();
        return redirect('ordonnances/'.$id_adm);
    }

    public function print($id_ord){
        $ord = Ordonnance::where('id_ord', $id_ord)->get()->first();
        $doctor = Medecin::getFull($ord->id_med);
        $ords = OrdonnanceMedic::where('id_ord', $id_ord)
            ->join('medicaments', 'medicaments.id_medic', 'ordonnances_medic.id_medic')
            ->get();
        $age = null;
        $patient = Admission::getOrdAdm($id_ord);
        if($patient){
            $id_adm = $patient->id_adm;
            $age = Patient::getAge($patient->datenai);
        }
        return PDF::loadView('ordonnance.print', ['patient'=> $patient, 'age'=>$age, 'ord'=>$ord, 'ords'=> $ords, 'doctor'=>$doctor])
            //->setPaper('Letter')
            ->setOption('page-width', '116.9')
            ->setOption('page-height', '139.7')
            ->setOrientation('portrait')
            ->setOption('margin-bottom', 2)
            ->setOption('margin-top', 5)
            ->setOption('margin-right', 2)
            ->setOption('margin-left', 2)
            ->inline();
    }
}
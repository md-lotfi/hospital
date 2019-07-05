<?php

namespace SP\Http\Controllers;

use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use SP\Admission;
use SP\GardMalade;
use SP\Infermiere;
use SP\Medecin;
use SP\Medicaments;
use SP\Ordonnance;
use SP\OrdonnanceMedic;
use SP\Patient;
use SP\PatientLit;
use SP\PatientRadio;
use SP\Radio;
use SP\Sall;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class RadioController extends Controller
{
    const TABLE = 'radios';

    public function index() {
        $radios = Radio::all();
        return view('radio.index', ['radios' => $radios]);
    }

    public function create() {
        return view('radio.create');
    }

    public function store(Request $request) {
        $radio = new Radio();
        $radio->nom_radio = $request->input('nom_radio');
        $radio->save();
        return redirect('radio');
    }

    public function edit($id_radio) {
        $radio = Radio::find($id_radio);
        return view('radio.edit', ['radio' => $radio]);
    }

    public function update(Request $request) {
        Radio::where(self::TABLE.'.id_radio', $request->input('id_radio'))->update(
            [
                'nom_radio' => $request->input('nom_radio')
            ]
        );
        return redirect('radio');
    }

    public function destroy($id_radio) {
        $radio = Medicaments::find($id_radio);
        $radio->delete();
        return redirect('radio');
    }

    public function print($id_radio){
        $radio = PatientRadio::where('patient_radios.id_radio', $id_radio)
            ->join('radios', 'radios.id_radio', 'patient_radios.id_radio')
            ->get()->first();
        $doctor = Medecin::getFull($radio->id_med);
        /*$ords = OrdonnanceMedic::where('id_ord', $id_ord)
            ->join('medicaments', 'medicaments.id_medic', 'ordonnances_medic.id_medic')
            ->get();*/
        $age = null;
        $patient = Admission::getPatientAdm($radio->id_adm);

        $lit = PatientLit::getInfo($radio->id_adm);

        if($patient){
            $id_adm = $patient->id_adm;
            $age = Patient::getAge($patient->datenai);
        }
        return PDF::loadView('radio.print', ['patient'=> $patient, 'age'=>$age, 'radio'=>$radio, 'lit'=> $lit, 'doctor'=>$doctor])
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
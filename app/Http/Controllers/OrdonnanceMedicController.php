<?php

namespace SP\Http\Controllers;

use SP\Admission;
use SP\Infermiere;
use SP\Lit;
use SP\Medecin;
use SP\Medicaments;
use SP\Ordonnance;
use SP\OrdonnanceMedic;
use SP\Patient;
use SP\PatientLit;
use SP\Prelevement;
use SP\Sall;
use SP\Service;
use SP\Soin;
use SP\Unite;
use SP\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class OrdonnanceMedicController extends Controller
{
    const TABLE = 'ordonnances_medic';

    /**
     * Afficher les soins des patients déja enregistrer
     * @param $id_patient
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id_ord){
        $ord = Ordonnance::where(self::TABLE.'.id_ord', $id_ord)
            ->leftJoin('ordonnances_medic', 'ordonnances_medic.id_ord', 'ordonnances.id_ord')
            ->join('medicaments', 'medicaments.id_medic', 'ordonnances_medic.id_medic')
            ->join('medecin', 'medecin.id_med', 'ordonnances.id_med')
            ->join('admissions', 'admissions.id_adm', 'ordonnances.id_adm')
            ->join('users', 'users.id', 'medecin.id_user')
            ->join('patients', 'patients.id_patient', 'admissions.id_patient')
            ->get();
        $id_adm = null;
        //$patient = new Patient();
        $age = null;
        $patient = Admission::getOrdAdm($id_ord);
        if($patient){
            $id_adm = $patient->id_adm;
            $age = Patient::getAge($patient->datenai);
        }
        return view('ordonnance.medics', ['patient'=> $patient, 'age'=>$age, 'ords'=> $ord, 'id_adm'=>$id_adm, 'id_ord'=>$id_ord]);
    }

    public function create($id_ord, $id_adm) {
        $medics = Medicaments::all();
        return view('ordonnance.create_medic', ['id_adm'=>$id_adm, 'id_ord'=>$id_ord, 'medics'=>$medics]);
    }

    public function store(Request $request) {
        $ord_med = new OrdonnanceMedic();
        $ord_med->id_ord = $request->input('id_ord');
        $ord_med->id_medic = $request->input('id_medic');
        $ord_med->doze_ord = $request->input('dose_ord');
        $ord_med->freq_ord = $request->input('freq_ord');
        $ord_med->qte_ord = $request->input('qte_ord');
        $ord_med->delay_ord = $request->input('delay_ord');
        //$ord_med->observation = $request->input('observation');
        $ord_med->save();
        return redirect('/ordonnances/medic/add/'.$request->input('id_ord').'/'.$request->input('id_adm'));
    }

    public function edit($id_ord_medic) {
        $ord = OrdonnanceMedic::where('id_ord_medic', $id_ord_medic)->get()->first();
        $medics = Medicaments::all();
        return view('ordonnance.edit_medic', ['ord'=>$ord, 'medics'=>$medics]);
    }

    public function update(Request $request) {
        $ord = OrdonnanceMedic::where(self::TABLE.'.id_ord_medic', $request->input('id_ord_medic'));
        $id_ord = $ord->get()->first()->id_ord;
        $ord->update(
            [
                'id_medic' => $request->input('id_medic'),
                'doze_ord' => $request->input('dose_ord'),
                'freq_ord' => $request->input('freq_ord'),
                'qte_ord' => $request->input('qte_ord'),
                'delay_ord' => $request->input('delay_ord')
            ]
        );
        return redirect('/ordonnances/medic/list/'.$id_ord);
    }

    public function destroy($id_ord_medic) {
        $om = OrdonnanceMedic::where('id_ord_medic', $id_ord_medic);
        $id_ord = $om->get()->first()->id_ord;
        $om->delete();
        return redirect('ordonnances/medic/list/'.$id_ord);
    }
}
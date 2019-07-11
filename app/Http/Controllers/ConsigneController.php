<?php

namespace SP\Http\Controllers;

use SP\Admission;
use SP\Consigne;
use SP\Infermiere;
use SP\Lit;
use SP\Medecin;
use SP\Medicaments;
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

class ConsigneController extends Controller
{
    const TABLE = 'consigne';

    /**
     * Afficher les soins des patients déja enregistrer
     * @param $id_patient
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id_adm){
        $consignes = Consigne::where('consigne.id_adm', $id_adm)
            ->Join('admissions', 'admissions.id_adm', '=', 'consigne.id_adm')
            ->Join('patients', 'patients.id_patient', '=', 'admissions.id_patient')
            ->Join('medecin', 'medecin.id_med', '=', 'consigne.id_medecin')
            ->Join('users', 'users.id', '=', 'medecin.id_user')
            ->get();
        return view('consigne.index', [
            'consignes' => $consignes,
            'p_name' => $consignes->count() > 0  ? $consignes[0]->name : '',
            'p_prenom' => $consignes->count() > 0  ? $consignes[0]->prenom : '',
            'id_adm'=>$id_adm]);
    }

    public function all(){
        $consignes = Consigne::
            where('received', 0)
            ->Join('admissions', 'admissions.id_adm', '=', 'consigne.id_adm')
            ->Join('patients', 'patients.id_patient', '=', 'admissions.id_patient')
            ->Join('medecin', 'medecin.id_med', '=', 'consigne.id_medecin')
            ->Join('users', 'users.id', '=', 'medecin.id_user')
            ->groupBy('patients.id_patient')
            ->get();
        return view('consigne.all', ['consignes' => $consignes]);
    }

    public function received($id_consigne){
        Consigne::where('id_consigne', $id_consigne)->update([
            'received'=>1
        ]);
        return redirect('/consigne/all/unreceived');
    }

    public function create($id_adm) {
        $p = Admission::getPatientAdm($id_adm);
        $a = new \DateTime($p->datenai);
        return view('consigne.create', ['patient'=>$p, 'age'=>$a->diff(Now())->y, 'id_adm'=>$id_adm]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        if( $user ) {
            if( $user->type = User::MEDECIN_TYPE ) {
                $med = Medecin::where('id_user', $user->id)->get()->first();
                if( $med ) {
                    $cons = new Consigne();
                    $cons->id_adm = $request->input('id_adm');
                    $cons->id_medecin = $med->id_med;
                    $cons->observation = $request->input('observation');
                    $cons->save();
                }
            }
        }
        return response()->redirectTo('messages?redirect='.urldecode('consigne/'.$request->input('id_adm')))
            ->with('success', "Consigne enregistrer avec succées, Redirection vers la page des consignes aprés 5 seconds...");
        //return redirect('consigne/'.$request->input('id_patient'));
    }

    public function edit($id_consigne) {
        $cons = Consigne::where('id_consigne', $id_consigne)->get()->first();
        return view('consigne.edit', ['consigne'=>$cons]);
    }

    public function update(Request $request) {
        $consigne = Consigne::where(self::TABLE.'.id_consigne', $request->input('id_consigne'));
        $id_adm = $consigne->get()->first()->id_adm;
        $consigne->update(
            [
                'observation' => $request->input('observation')
            ]
        );
        return redirect('consigne/'.$id_adm);
    }

    public function destroy($id_prel) {
        $consigne = Consigne::find($id_prel);
        $id_adm = $consigne->get()->first()->id_adm;
        $consigne->delete();
        return redirect('consigne/'.$id_adm);
    }
}
<?php

namespace SP\Http\Controllers;

use SP\Admission;
use SP\Lit;
use SP\PatientLit;
use SP\Sall;
use SP\Service;
use SP\Unite;
use Illuminate\Http\Request;

class PatientLitController extends Controller
{
    const TABLE = 'patient_lit';

    public function service($id_adm){
        $services = Service::all();
        return view('patientLit.service', ['services' => $services, 'id_adm'=>$id_adm]);
    }

    public function unite($id_adm, $id_service){
        $unites = Unite::where('id_service', $id_service)->get();
        return view('patientLit.unite', ['unites' => $unites, 'id_adm'=>$id_adm]);
    }

    public function salle($id_adm, $id_unite){
        $salles = Sall::where('id_unite', $id_unite)->get();
        return view('patientLit.salle', ['salles' => $salles, 'id_adm'=>$id_adm]);
    }

    public function lit($id_adm, $id_salle){
        $lits = Lit::where('id_salle', $id_salle)->get();
        return view('patientLit.lit', ['lits' => $lits, 'id_salle'=>$id_salle, 'id_adm'=>$id_adm]);
    }

    public function next(Request $request){
        $id_adm = $request->input('id_adm');
        $type = $request->input('type');
        if( $type === 'service' ) {
            $id_service = $request->input('id_service');
            return redirect('patientlit/unite/'.$id_adm.'/'.$id_service);
        }elseif( $type === 'unite' ) {
            $id_unite = $request->input('id_unite');
            return redirect('patientlit/salle/'.$id_adm.'/'.$id_unite);
        }elseif( $type === 'salle' ) {
            $id_salle = $request->input('id_salle');
            return redirect('patientlit/lit/'.$id_adm.'/'.$id_salle);
        }elseif( $type === 'lit' ) {
            PatientLit::where('id_adm', $id_adm)->update(
                [
                    'busy' => PatientLit::LIT_FREE,
                ]
            );
            $pl = new PatientLit();
            $pl->id_adm = $id_adm;
            $pl->id_lit = $request->input('id_lit');
            $pl->id_salle = $request->input('id_salle');
            $pl->save();
            $adm = Admission::getPatientAdm($id_adm);
            if( $adm ) {
                return response()->redirectTo('messages?redirect=' . urldecode('patient/get/' . $adm->id_patient))
                    ->with('success', "Service enregistrer pour le patient $adm->nom $adm->prenom, Redirection vers les détails du patients dans 5 seconds...");
            }else{
                return back()
                    ->with('error', "Une érreur est survenue lors de l'insertion, veuillez réssayer.");
            }
        }
        return back()->with('error', "Commande inconnue");
    }
}

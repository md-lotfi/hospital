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
        if( !PatientLit::isBusy($request->input('id_lit')) ) {
            $id_adm = $request->input('id_adm');
            $pl = new PatientLit();
            $pl->id_adm = $id_adm;
            $pl->id_lit = $request->input('id_lit');
            $pl->id_salle = $request->input('id_salle');
            $pl->busy = PatientLit::LIT_BUSY;
            $pl->save();
            $adm = Admission::getPatientAdm($id_adm);
            if ($adm) {
                return response()->redirectTo('messages?redirect=' . urldecode('patient/get/' . $adm->id_patient))
                    ->with('success', "Service enregistrer pour le patient $adm->nom $adm->prenom, Redirection vers les détails du patients dans 5 seconds...");
            } else {
                return back()
                    ->with('error', "Une érreur est survenue lors de l'insertion, veuillez réssayer.");
            }
        }else{
            return back()->with('warning', "Le lit N° ".$request->input('id_lit')." dans la salle N° ".$request->input('id_salle')." est occupé.");
        }
        /*$id_adm = $request->input('id_adm');
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
            //$l = PatientLit::where('id_adm', $id_adm);
            //$x = $l->get()->first();
            if( !PatientLit::isBusy($request->input('id_lit')) ) {
                $pl = new PatientLit();
                $pl->id_adm = $id_adm;
                $pl->id_lit = $request->input('id_lit');
                $pl->id_salle = $request->input('id_salle');
                $pl->busy = PatientLit::LIT_BUSY;
                $pl->save();
                $adm = Admission::getPatientAdm($id_adm);
                if ($adm) {
                    return response()->redirectTo('messages?redirect=' . urldecode('patient/get/' . $adm->id_patient))
                        ->with('success', "Service enregistrer pour le patient $adm->nom $adm->prenom, Redirection vers les détails du patients dans 5 seconds...");
                } else {
                    return back()
                        ->with('error', "Une érreur est survenue lors de l'insertion, veuillez réssayer.");
                }
            }else{
                return back()->with('warning', "Le lit N° ".$request->input('id_lit')." dans la salle N° ".$request->input('id_salle')." est occupé.");
            }
        }
        return back()->with('error', "Commande inconnue");*/
    }

    public function ajax(Request $request){
        //echo $request->input('select');
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $output = '';
        if( $dependent === 'unite' ){
            $data = Unite::where('id_service', $value)->get();
            $output = '<option value="">Selectionner '.ucfirst($dependent).'</option>';
            foreach($data as $row)
            {
                $output .= '<option value="'.$row->id_unite.'">'.$row->nom_unite.'</option>';
            }
        }else if( $dependent === 'salle' ){
            $data = Sall::where('id_unite', $value)->get();
            $output = '<option value="">Selectionner '.ucfirst($dependent).'</option>';
            foreach($data as $row)
            {
                $output .= '<option value="'.$row->id_salle.'">'.$row->nom_salle.'</option>';
            }
        }else if( $dependent === 'lit' ){
            $pl = PatientLit::where('busy', PatientLit::LIT_BUSY)
                ->pluck('id_lit')
                ->toArray();
            if( !$pl )
                $pl = array();
            /*var_dump($pl);
            exit();*/
            $data = Lit::where('id_salle', $value)
                ->whereNotIn('id_lit', $pl)
                ->get();
            $output = '<option value="">Selectionner '.ucfirst($dependent).'</option>';
            foreach($data as $row)
            {
                $output .= '<option value="'.$row->id_lit.'">'.$row->nom_lit.'</option>';
            }
        }
        /*$data = DB::table('country_state_city')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();
        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }*/
        echo $output;
    }
}

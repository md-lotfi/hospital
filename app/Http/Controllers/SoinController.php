<?php

namespace SP\Http\Controllers;

use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use SP\Admission;
use SP\Infermiere;
use SP\Lit;
use SP\Medecin;
use SP\Medicaments;
use SP\Patient;
use SP\PatientLit;
use SP\Prelevement;
use SP\Psychotrope;
use SP\Sall;
use SP\Service;
use SP\Soin;
use SP\Unite;
use SP\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

/**
 * Normalment médicament
 * Class SoinController
 * @package SP\Http\Controllers
 */
class SoinController extends Controller
{
    const TABLE = 'soins';

    /**
     * Afficher les soins des patients déja enregistrer
     * @param $id_patient
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id_adm){
        $soins = Soin::where('soins.id_adm', $id_adm)
            ->join('admissions', 'admissions.id_adm', '=', 'soins.id_adm')
            ->leftJoin('patients', 'patients.id_patient', '=', 'admissions.id_patient')
            ->leftJoin('infirmiere', 'infirmiere.id_inf', '=', 'soins.id_inf')
            ->leftJoin('medicaments', 'medicaments.id_medic', '=', 'soins.id_medic')
            ->leftJoin('users', 'users.id', '=', 'infirmiere.id_user')
            //->orderBy('name', 'desc')
            ->get();
        $p = Admission::getPatientAdm($id_adm);
        $pos = PatientLit::getInfo($id_adm);
        return view('soin.index', ['soins' => $soins, 'id_adm'=>$id_adm, 'age'=>Patient::getAge($p->datenai), 'position'=>$pos, 'patient'=>$p]);
    }

    public function getSoin($id_adm){
        $soins = Soin::where('soins.id_adm', $id_adm)
            ->leftJoin('infirmiere', 'infirmiere.id_inf', '=', 'soins.id_inf')
            ->leftJoin('medicaments', 'medicaments.id_medic', '=', 'soins.id_medic')
            ->leftJoin('users', 'users.id', '=', 'infirmiere.id_user')
            //->orderBy('name', 'desc')
            ->get();
        $psys = Psychotrope::where('psychtropes.id_adm', $id_adm)
            ->leftJoin('infirmiere', 'infirmiere.id_inf', '=', 'psychtropes.id_inf')
            ->leftJoin('medecin', 'medecin.id_med', '=', 'psychtropes.id_med')
            ->leftJoin('users as u_inf', 'u_inf.id', '=', 'infirmiere.id_user')
            ->leftJoin('users as u_med', 'u_med.id', '=', 'medecin.id_user')
            ->select(
                'infirmiere.*',
                'psychtropes.*',
                'medecin.*',
                'u_inf.name as name_inf',
                'u_med.name as name_med'
            )
            ->get();
        $prelvs = Prelevement::where('prelevements.id_adm', $id_adm)
            ->leftJoin('infirmiere', 'infirmiere.id_inf', '=', 'prelevements.id_inf')
            ->leftJoin('users as u_inf', 'u_inf.id', '=', 'infirmiere.id_user')
            ->select(
                'prelevements.*',
                'infirmiere.*',
                'u_inf.name as name_inf'
            )
            ->get();
        $p = Admission::getPatientAdm($id_adm);
        $pos = PatientLit::getInfo($id_adm);
        $lit = PatientLit::getInfo($id_adm);
        return [
            'soins' => $soins,
            'psys' => $psys,
            'prelevs' => $prelvs,
            'id_adm'=>$id_adm,
            'age'=>Patient::getAge($p->datenai),
            'position'=>$pos,
            'patient'=>$p,
            'lit'=>$lit
        ];
    }

    public function list($id_adm){
        return view('soin.list', $this->getSoin($id_adm));
    }

    public function create($id_adm) {
        $medics = Medicaments::all();
        $p = Admission::getPatientAdm($id_adm);
        $pos = PatientLit::getInfo($id_adm);
        return view('soin.create', ['medics'=>$medics, 'position'=>$pos, 'age'=>Patient::getAge($p->datenai), 'patient'=>$p, 'id_adm'=>$id_adm]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        if( $user ) {
            if( $user->type = User::INFERMIERE_TYPE ) {
                $inf = Infermiere::where('id_user', $user->id)->get()->first();
                $medic = new Soin();
                $medic->id_adm = $request->input('id_adm');
                $medic->id_inf = $inf->id_inf;
                $medic->id_medic = $request->input('id_medic');
                $medic->voie = $request->input('nom_voie');
                $medic->dose_admini = $request->input('dose');
                $medic->save();
            }
        }
        return redirect('soin/'.$request->input('id_adm'));
    }

    public function edit($id_soin) {
        $medics = Medicaments::all();
        $soin = Soin::where('id_soin', $id_soin)->get()->first();
        return view('soin.edit', ['soin'=>$soin, 'medics'=>$medics]);
    }

    public function update(Request $request) {
        $soin = Soin::where(self::TABLE.'.id_soin', $request->input('id_soin'));
        $id_adm = $soin->get()->first()->id_adm;
        $soin->update(
            [
                'id_medic' => $request->input('id_medic'),
                'dose_admini' => $request->input('dose'),
                'voie' => $request->input('nom_voie')
            ]
        );
        return redirect('soin/'.$id_adm);
    }

    public function destroy($id_soin) {
        $soin = Soin::find($id_soin);
        $id_adm = $soin->get()->first()->id_adm;
        $soin->delete();
        return redirect('soin/'.$id_adm);
    }

    public function buttons(){
        return view('soin.buttons');
    }

    public function print($id_adm){
        return PDF::loadView('soin.print', $this->getSoin($id_adm))
            ->setPaper('a4')
            /*->setOption('page-width', '116.9')
            ->setOption('page-height', '139.7')*/
            ->setOrientation('portrait')
            ->setOption('margin-bottom', 5)
            ->setOption('margin-top', 5)
            ->setOption('margin-right', 5)
            ->setOption('margin-left', 5)
            ->inline();
    }
}
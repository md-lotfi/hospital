<?php

namespace SP\Http\Controllers;

use SP\Admission;
use SP\GardemAdm;
use SP\GardMalade;
use Illuminate\Http\Request;

class GardemAdmController extends Controller
{
    const TABLE = 'gardem_adm';

    /**
     * Sans bouton
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id_adm) {
        $gardems = GardemAdm::where('id_adm', $id_adm);
        return view('gardemAdm.index', ['gardems' => $gardems]);
    }

    public function myGardem($id_adm) {
        $patient = Admission::getPatientAdm($id_adm);
        $gardems = GardemAdm::getGardem($id_adm);
        /*$gardems = Admission::where('admissions.id_patient', $id_patient)
            ->leftJoin('gardem_adm', 'gardem_adm.id_adm', '=', 'admissions.id_adm')
            ->leftJoin('gardem', 'gardem.id_gardem', '=', 'gardem_adm.id_gardem')
            ->select(
                'admissions.id_adm as id_admission',
                'gardem.nom',
                'gardem.prenom',
                'gardem.lien_parent',
                'gardem.adr',
                'gardem.tel',
                'gardem.id_gardem',
                'gardem_adm.date_debut'
            )->get();*/
        return view('gardemAdm.index', ['gardems' => $gardems]);
    }

    /**
     * avec bouton
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($id_adm) {
        $gardems = GardMalade::all();
        return view('gardemAdm.create', ['gardems' => $gardems, 'id_adm'=>$id_adm]);
    }

    public function dconfig_show($id_adm, $id_gardem) {
        return view('gardemAdm.dconfig_show', ['id_adm' => $id_adm, 'id_gardem'=>$id_gardem]);
    }

    /**
     * Dernière tache
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function dconfig_store(Request $request) {
        $gm = new GardemAdm();
        $gm->id_adm = $request->input('id_adm');
        $gm->id_gardem = $request->input('id_gardem');
        $gm->date_debut = $request->input('date_debut');
        $gm->date_fin = $request->input('date_fin');
        $gm->save();

        $adm = Admission::getPatientAdm($request->input('id_adm'));

        return redirect('patient/get/'.$adm->id_patient);
    }

    public function store(Request $request) {
        return redirect('dconfig_show/'.$request->input('id_adm').'/'.$request->input('id_gardem'));
    }

    /*public function edit($id_gardem) {
        $gardem = GardMalade::find($id_gardem);
        return view('gardem.edit', ['gardem' => $gardem]);
    }

    public function update(Request $request) {
        $gardem = GardMalade::where(self::TABLE.'.id_gardem', $request->input('id_gardem'))->update(
            [
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'lien_parent' => $request->input('lien_parent'),
                'adr' => $request->input('adr'),
                'tel' => $request->input('tel')
            ]
        );
        return redirect('gardem');
    }

    public function destroy($id_gardem) {
        $gardem = GardMalade::find($id_gardem);
        $gardem->delete();
        return redirect('gardem');
    }*/
}
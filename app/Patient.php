<?php

namespace SP;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = "patients";
    protected $primaryKey = "id_patient";

    public static function getAge($datenai){
        $a = new \DateTime($datenai);
        return $a->diff(Now())->y;
    }

    public static function getPatientDetails($id_patient){
        return Patient::where('patients.id_patient',$id_patient)
            //->whereNull('gardem_adm.date_fin')
            //->where('patient_lit.busy', '=', PatientLit::LIT_FREE)
            ->leftJoin('admissions', 'patients.id_patient', '=', 'admissions.id_patient')
            ->leftJoin('patient_lit', 'admissions.id_adm', '=', 'patient_lit.id_adm')
            ->leftJoin('lits', 'lits.id_lit', '=', 'patient_lit.id_lit')
            ->leftJoin('salls', 'salls.id_salle', '=', 'lits.id_salle')
            ->leftJoin('unite', 'unite.id_unite', '=', 'salls.id_unite')
            ->leftJoin('services', 'services.id_service', '=', 'unite.id_service')
            ->leftJoin('gardem_adm', 'gardem_adm.id_adm', '=', 'admissions.id_adm')
            ->leftJoin('gardem', 'gardem.id_gardem', '=', 'gardem_adm.id_gardem')
            ->leftJoin('sortie_patient', 'sortie_patient.id_adm', '=', 'admissions.id_adm')
            ->leftJoin('medecin', 'medecin.id_med', '=', 'sortie_patient.id_med')
            ->select(
                'patients.*',
                'admissions.id_adm as id_admission',
                'admissions.motif',
                'admissions.diag',
                'admissions.date_adm',
                'patient_lit.*',
                'lits.*',
                'salls.*',
                'unite.*',
                'gardem.nom as nom_gardem',
                'gardem.prenom as prenom_gardem',
                'gardem_adm.date_debut as date_debut_gardem',
                'services.nom as nom_service',
                'sortie_patient.*',
                'medecin.*'
            )
            ->groupBy('admissions.id_adm')
            ->orderBy('admissions.created_at', 'desc')
            ->get();
    }
}

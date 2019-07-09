<?php

namespace SP;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $table = "admissions";
    protected $primaryKey = 'id_adm';

    public static function getPatientAdm($id_adm){
        return Admission::where('id_adm', $id_adm)->join('patients', 'patients.id_patient', '=', 'admissions.id_patient')->get()->first();
    }

    public static function getOrdAdm($id_ord){
        return Ordonnance::where('ordonnances.id_ord', $id_ord)
            ->Join('admissions', 'admissions.id_adm', '=', 'ordonnances.id_adm')
            ->Join('patients', 'patients.id_patient', '=', 'admissions.id_patient')->get()->first();
    }

    public static function getPatientAdmAll($id_patient){
        return Admission::where('admissions.id_patient', $id_patient)->Join('patients', 'patients.id_patient', '=', 'admissions.id_patient')->get();
    }
}

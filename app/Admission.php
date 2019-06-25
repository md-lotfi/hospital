<?php

namespace SP;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $table = "admissions";
    protected $primaryKey = 'id_adm';

    public static function getPatientAdm($id_adm){
        return Admission::where('id_adm', $id_adm)->Join('patients', 'patients.id_patient', '=', 'admissions.id_patient')->get()->first();
    }
}

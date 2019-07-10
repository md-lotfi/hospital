<?php

namespace SP;

use Illuminate\Database\Eloquent\Model;

class PatientRadio extends Model
{
    protected $table = 'patient_radios';
    protected $primaryKey = 'id_pr';

    public static function getRadio($id_adm){
        return PatientRadio::where('id_adm', $id_adm)
            ->join('radios', 'radios.id_radio', 'patient_radios.id_radio')
            ->get();
    }
}

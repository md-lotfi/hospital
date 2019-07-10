<?php

namespace SP;

use Illuminate\Database\Eloquent\Model;

class Psychotrope extends Model
{
    protected $table = 'psychtropes';
    protected $primaryKey = 'id_psy';

    public static function getPsychotropes($id_adm){
        return Psychotrope::where('psychtropes.id_adm', $id_adm)
            ->Join('admissions', 'admissions.id_adm', '=', 'psychtropes.id_adm')
            ->leftJoin('patients', 'patients.id_patient', '=', 'admissions.id_patient')
            ->leftJoin('infirmiere', 'infirmiere.id_inf', '=', 'psychtropes.id_inf')
            ->leftJoin('medecin', 'medecin.id_med', '=', 'psychtropes.id_med')
            ->leftJoin('users as u_inf', 'u_inf.id', '=', 'infirmiere.id_user')
            ->leftJoin('users as u_med', 'u_med.id', '=', 'medecin.id_user')
            ->select(
                'patients.*',
                'admissions.*',
                'infirmiere.*',
                'psychtropes.*',
                'medecin.*',
                'u_inf.name as name_inf',
                'u_med.name as name_med'
            )
            ->get();
    }
}

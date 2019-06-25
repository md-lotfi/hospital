<?php

namespace SP;

use Illuminate\Database\Eloquent\Model;

class Soin extends Model
{
    protected $table = 'soins';
    protected $primaryKey = 'id_soin';

    CONST VOIE_ADMINISTRATIONS = ['Cutanée',
                            'Transdermique',
                            'Orale',
                            'Auriculaire',
                            'Nasale'];

    public static function getSoin($id_adm){
        return Soin::where('soins.id_adm', $id_adm)
            ->Join('admissions', 'admissions.id_adm', '=', 'soins.id_adm')
            ->leftJoin('patients', 'patients.id_patient', '=', 'admissions.id_patient')
            ->leftJoin('infirmiere', 'infirmiere.id_inf', '=', 'soins.id_inf')
            ->leftJoin('medicaments', 'medicaments.id_medic', '=', 'soins.id_medic')
            ->leftJoin('users', 'users.id', '=', 'infirmiere.id_user')
            ->get();
    }
}

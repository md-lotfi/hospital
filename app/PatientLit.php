<?php

namespace SP;

use Illuminate\Database\Eloquent\Model;

class PatientLit extends Model
{
    protected $table = 'patient_lit';
    protected $primaryKey = 'id_patient_lit';

    const LIT_BUSY = 1;
    const LIT_FREE = 0;

    public static function getInfo($id_adm){
        return PatientLit::where('id_adm', $id_adm)
            ->leftJoin('lits', 'lits.id_lit', '=', 'patient_lit.id_lit')
            ->leftJoin('salls', 'salls.id_salle', '=', 'lits.id_salle')
            ->leftJoin('unite', 'unite.id_unite', '=', 'salls.id_unite')
            ->leftJoin('services', 'services.id_service', '=', 'unite.id_service')
            ->get()->first();
    }

    /**
     * @param $id_lit
     * @return bool
     */
    public static function isBusy($id_lit){
        $ls = PatientLit::where('id_lit', $id_lit)->get();
        foreach ($ls as $l){
            if( $l->busy === self::LIT_BUSY )
                return true;
        }
        return false;
    }
}

<?php

namespace SP;

use Illuminate\Database\Eloquent\Model;

class GardemAdm extends Model
{
    protected $table = 'gardem_adm';
    protected $primaryKey = 'id_gardem_adm';

    public static function getGardem($id_adm){
        return GardemAdm::where('id_adm', $id_adm)
            ->join('gardem', 'gardem.id_gardem', 'gardem_adm.id_gardem')
            ->get();
    }
}
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
}
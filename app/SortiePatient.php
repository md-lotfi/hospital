<?php

namespace SP;

use Illuminate\Database\Eloquent\Model;

class SortiePatient extends Model
{
    protected $table = 'sortie_patient';
    protected $primaryKey = 'id_sp';

    CONST DIAGNOSTIC = ['Décée',
                        'Evacuation',
                        'Terminer',
                        'Transfert'
                        ];
}

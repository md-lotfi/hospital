<?php

namespace SP;

use Illuminate\Database\Eloquent\Model;

class PatientLit extends Model
{
    protected $table = 'patient_lit';
    protected $primaryKey = 'id_patient_lit';

    const LIT_BUSY = 1;
    const LIT_FREE = 0;
}

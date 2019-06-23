<?php

namespace SP;

use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    protected $table = 'medecin';
    protected $primaryKey = 'id_med';

    protected $fillable = ['prenom_med', 'adr_med', 'te_med', 'spec_med', 'grade_med'];
}

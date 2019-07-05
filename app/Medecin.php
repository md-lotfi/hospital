<?php

namespace SP;

use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    protected $table = 'medecin';
    protected $primaryKey = 'id_med';

    protected $fillable = ['prenom_med', 'adr_med', 'te_med', 'spec_med', 'grade_med'];

    public static function getFull($id_med){
        return Medecin::where('id_med', $id_med)
            ->join('users', 'users.id', 'medecin.id_user')
            ->get()
            ->first();
    }
}

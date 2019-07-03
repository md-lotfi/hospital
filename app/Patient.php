<?php

namespace SP;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = "patients";
    protected $primaryKey = "id_patient";

    public static function getAge($datenai){
        $a = new \DateTime($datenai);
        return $a->diff(Now())->y;
    }
    
}

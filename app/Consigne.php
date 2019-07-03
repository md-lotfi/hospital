<?php

namespace SP;

use Illuminate\Database\Eloquent\Model;

class Consigne extends Model
{
    protected $table = "consigne";
    protected $primaryKey = "id_consigne";

    const CONSIGN_VIEWED = 1;
    const CONSIGN_NOT_VIEWED = 0;

    public static function hasUnreceived(){
        $c = \SP\Consigne::where('received', 0)->get();
        if( $c )
            if( $c->count() > 0 )
                return true;

            return false;
    }
}

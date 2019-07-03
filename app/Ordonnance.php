<?php

namespace SP;

use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    protected $table = 'ordonnances';
    protected $primaryKey = 'id_ord';
}

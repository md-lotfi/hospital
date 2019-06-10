<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $table="cvs";
    protected $fillable=[
        'titre',
        'presentation'
    ];
}

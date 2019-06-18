<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ADMIN_TYPE = 'admin';
    const MEDECIN_TYPE = 'medecin';
    const INFERMIERE_TYPE = 'infermiere';
    const SECRETAIRE_TYPE = 'secretaire';
    const DEFAULT_TYPE = 'default';

    public function isAdmin()    {
        return $this->type === self::ADMIN_TYPE;
    }

    public function isMedecin()    {
        return $this->type === self::MEDECIN_TYPE;
    }

    public function isInfermiere()    {
        return $this->type === self::INFERMIERE_TYPE;
    }

    public function isDefault()    {
        return $this->type === self::DEFAULT_TYPE;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

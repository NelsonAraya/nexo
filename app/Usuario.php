<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres', 'rol', 'apellidop','apellidom',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function NombreSimple(){
        $porcion = explode(' ',$this->nombres);
        return $porcion[0].' '.$this->apellidop.' '.$this->apellidom;
    }
    public function nexos(){
        return $this->hasMany(Nexo::class);
    }

    public function asistencias(){
        return $this->hasMany(Asistencia::class);
    }
}

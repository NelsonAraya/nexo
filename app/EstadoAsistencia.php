<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoAsistencia extends Model
{
    protected $table = "estados_asistencias";

    protected $fillable =['nombre'];

    public function asistencias(){
        return $this->hasMany(Asistencia::class);
    }
}

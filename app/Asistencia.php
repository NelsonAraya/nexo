<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    //

    public function estado(){
        return $this->belongsTo(EstadoAsistencia::class);
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
}

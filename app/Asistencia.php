<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = "asistencias";

    protected $fillable =['nexo_id','usuario_id','estado_id'];

    public function estado(){
        return $this->belongsTo(EstadoAsistencia::class);
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = "grupos";

    protected $fillable =['nombre','funcion','obac','estado_id'];

    public function estado(){
        return $this->belongsTo(EstadoGrupo::class);
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class,'obac','id');
    }
}

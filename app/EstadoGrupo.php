<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoGrupo extends Model
{
    protected $table = "estados_grupos";

    protected $fillable =['nombre'];

    public function grupos(){
        return $this->hasMany(Grupo::class);
    }
}

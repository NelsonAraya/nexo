<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nexo extends Model
{
    protected $table = "nexos";

    protected $fillable =['usuario_id','direccion','clave'];

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function observaciones(){
        return $this->hasMany(Observacion::class);
    }

    public function obac_cia(){
        return $this->belongsTo(Usuario::class,'obac','id');
    }

}

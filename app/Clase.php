<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $fillable = ['clase', 'descripcion', 'habilidad'];

    function getClase()
    {
        return $this->clase;
    }
    function getHabilidad(){
        return $this->habilidad;
    }


}

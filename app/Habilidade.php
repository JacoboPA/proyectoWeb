<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habilidade extends Model
{
    protected $fillable = ['habilidad', 'descripcion'];

    function getNombre()
    {
        return $this->nombre_habilidad;
    }

}

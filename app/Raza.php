<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raza extends Model
{
    protected $fillable = ['raza', 'habilida', 'clase'];

    function getNombre()
    {
        return $this->raza;
    }



}

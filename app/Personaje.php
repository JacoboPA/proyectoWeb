<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Personaje extends Model
{
    protected $fillable = ['clase','raza','nombre','historia','imagen','name'];

    function  getNombre(){
        $this->nombre;
    }
}

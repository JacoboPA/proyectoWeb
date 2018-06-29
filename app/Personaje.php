<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Personaje extends Model
{
    /*
     * cualquier modificacion que se quiera hacer , ya sea verificar algo o devolver algo , se hace aquí.
     */
    protected $fillable = ['clase', 'raza', 'nombre', 'historia', 'imagen', 'name'];

    function getNombre()
    {
        return $this->nombre;
    }
    function getImagen(){
        return $this->imagen;
    }
    function getClase(){
        return $this->clase;
    }

    function getAvatar()
    {
        if ($this->imagen)
            if ($this->imagen[0] == 'h')
                return asset($this->imagen);
            else
                return asset('/avatares/' . $this->imagen);
        else
            return asset('https://vignette.wikia.nocookie.net/icarly/images/7/76/Troll_guy.png/revision/latest?cb=20110824142105');
    }

    function getHistoria(){
        /*
         * seguramente aquí se pueda formatear la historia y asignar los párrafos pertinentes.
         */
    }
}

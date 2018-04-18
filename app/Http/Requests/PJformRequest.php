<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PJformRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'=>'required|min:3',
            //comentamos para entrega laravel , pero son necesarios apra su envío a la BDD 'clase'=> 'required',
            //posible validación lado servidor para evitar estos dos campos , idea validacion en PJController@create'raza'=> 'required',
            'historia'=>'required|min:10',
        ];
    }
}

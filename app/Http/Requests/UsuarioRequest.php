<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            
            'nombres' => 'required | min:2 | max: 38',
            'apellidos' => 'required | min:2  | max:38',
            'cedula' => 'required | unique:usuarios',
            'cargo' => 'required | max:38',
            'telefono' => 'required',
            'celular' => 'required',
            'idArea' => 'required'

        ];
    }
}

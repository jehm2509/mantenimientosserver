<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            
            'nombres' => 'required | min:2 | max:38',
            'apellidos' => 'required | min:2 | max:38',
            'cedula' => 'unique:usuarios,cedula,' . $this->id . ',idUsuario', //segun el manual de Laravel a la hora de actualizar si solo dejamos que sea "unique" no permitira aceptar la cedula que el usuario ya tiene la tomara como ya registrada. entonces se coloca de la forma que aparece acá
            'cargo' => 'required | max:38',
            'telefono' => 'required',
            'celular' => 'required',
            'idArea' => 'required'
        ];
    }
}

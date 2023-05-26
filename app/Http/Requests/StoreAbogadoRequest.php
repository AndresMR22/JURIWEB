<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarCedula;
use App\Rules\ValidarCedulaRepetida;

class StoreAbogadoRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return
        [
            'nombres' => 'required|string|max:50',
            'apellidos' => 'required|string|max:50',
            'celular'  => 'required',
            'direccion' => 'required|string|max:250',
            'correo'    => 'required|email',
            'genero' =>'required|string|max:15',
            'estatus' =>'required|string',
            'cedula' => 'required|string|min:10|max:10',
        ];
    }
}

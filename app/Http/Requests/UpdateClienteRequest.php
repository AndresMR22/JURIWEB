<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
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
            'nombres' => 'required|string|max:50',
            'apellidos' => 'required|string|max:50',
            'celular'  => 'required|regex:/[0-9]{10}/',
            'direccion' => 'required|string|max:250',
            'genero' =>'required|string|max:15',
            'cedula' => 'required|string|min:10|max:10',
            'fnacimiento' =>'required|string',
            'estado_civil' =>'required|string',
        ];
    }
}

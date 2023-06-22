<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJuicioRequest extends FormRequest
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
            'nro' => 'required',
            'materia' => 'required|string',
            'estadop'  => 'required',
            'fecha' => 'required',
            'abogado_id' =>'required',
            'cliente_id' => 'required',
            'unidad_id' =>'required',
        ];
    }
}

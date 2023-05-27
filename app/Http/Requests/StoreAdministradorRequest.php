<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;


class StoreAdministradorRequest extends FormRequest
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
            'username' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                Password::min(8)
                ->letters()//al menos una letra
                ->mixedCase()// 1 may y 1 min
                ->numbers()//al menos 1 num
                ->symbols()//al menos 1 caracter especial
                //->uncompromised() 
            ],
           
        ];
    }
}

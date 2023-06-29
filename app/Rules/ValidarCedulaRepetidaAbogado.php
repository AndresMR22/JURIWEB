<?php

namespace App\Rules;

use App\Models\Abogado;
use App\Models\Cliente;
use Illuminate\Contracts\Validation\Rule;

class ValidarCedulaRepetidaAbogado implements Rule
{

    public function __construct()
    {
        //
    }


    public function passes($attribute, $value)
    {

            $respuesta = Abogado::where('cedula',$value)->first();


        if($respuesta != null){// no hay cedula repetida
            return false;//si hay cedula repetida
        }else{
            return true;//no hay cedula repetida
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La cédula ya existe';
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RecuperarController extends Controller
{
    public function recuperarContrasenia()
    {
        return view('recuperarContrasenia');
    }


    public function actualizarClave($email)
    {
        return view('actualizarContrasenia',compact('email'));
    }

    public function actualizarContrasenia(Request $request)
    {
        // dd($request);
        $user = User::where('email',$request->get('email'))->first();
        $user->update(
            [
                "password"=>Hash::make($request->get('password'))
            ]
        );
        return view('welcome');

    }
}

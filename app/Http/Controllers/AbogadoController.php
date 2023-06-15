<?php

namespace App\Http\Controllers;

use App\Models\Abogado;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreAbogadoRequest;
use App\Http\Requests\UpdateAbogadoRequest;
use Illuminate\Http\Request;
use App\Rules\ValidarCedula;
use App\Rules\ValidarCedulaRepetida;

class AbogadoController extends Controller
{
  
    public function index()
    {
        $abogados = Abogado::all();
        $empresas = Empresa::all();
        return view('admin.abogado.index',compact('abogados','empresas'));
    }

   
    public function create()
    {
        $empresas = Empresa::all();
        return view('admin.abogado.create',compact('empresas'));
    }

   
    public function store(StoreAbogadoRequest $request)
    {
        $user = User::create([
            "email"=>$request->correo,
            "name"=>$request->nombres,
            "password"=>Hash::make($request->celular)
        ]);

        $user->assignRole('Abogado');

        Abogado::create([
            "nombres"=>$request->nombres,
            "apellidos"=>$request->apellidos,
            "celular"=>$request->celular,
            "direccion"=>$request->direccion,
            "genero"=>$request->genero,
            "estatus"=>$request->estatus,
            "empresa_id"=>$request->empresa_id,
            "user_id"=>$user->id,
            "cedula"=>$request->cedula
        ]);

        return redirect()->route('abogado.index');
    }

    public function validarCedula(Request $request)
    {
        $msg1 = null; $msg2 = null;
        $cedula = !empty($request->get('cedula')) ? $request->get('cedula') : '';
        $vc = new ValidarCedula;
        $msg1 =  $vc->passes('cedula',$cedula);
        $vcr = new ValidarCedulaRepetida;
        $msg2 = $vcr->passes('cedula',$cedula);
        
        //logica para validar cedula
        return [$msg1,$msg2];
    }

    public function update(UpdateAbogadoRequest $request, $id)
    {
        $abogado = Abogado::find($id);

        $user_id = $abogado->user->id;
        $user = User::find($user_id);
        $user->update(
            [
            "name"=>$request->nombres,
            // "password"=>Hash::make($request->password)
            ]);


        $abogado->update([
            "cedula"=>$request->cedula,
            "nombres"=>$request->nombres,
            "apellidos"=>$request->apellidos,
            "celular"=>$request->celular,
            "direccion"=>$request->direccion,
            "genero"=>$request->genero,
            "estatus"=>$request->estatus,
            "empresa_id"=>$request->empresa_id
        ]);

        return back();
    }

    
    public function destroy($id)
    {
        Abogado::destroy($id);
        return back();
    }
}

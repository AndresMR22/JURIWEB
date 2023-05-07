<?php

namespace App\Http\Controllers;

use App\Models\Abogado;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreAbogadoRequest;
use App\Http\Requests\UpdateAbogadoRequest;

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

        dd($user);

        $user->assignRole('Abogado');

        Abogado::create([
            "nombres"=>$request->nombres,
            "apellidos"=>$request->apellidos,
            "celular"=>$request->celular,
            "direccion"=>$request->direccion,
            "genero"=>$request->genero,
            "estatus"=>$request->estatus,
            "empresa_id"=>$request->empresa_id,
            "user_id"=>$user->id
        ]);

        return redirect()->route('abogado.index');
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
            "nombres"=>$request->nombres,
            "apellidos"=>$request->apellidos,
            "celular"=>$request->celular,
            "direccion"=>$request->direccion,
            // "correo"=>$request->correo,
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

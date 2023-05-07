<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use App\Models\Abogado;
use App\Models\Provincia;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{

    public function index()
    {
        $abogado = Abogado::where('user_id',auth::id())->first();
        $clientes = Cliente::where('responsable_id',$abogado->id)->get();
        return view('admin.cliente.index',compact('clientes'));
    }

    public function create()
    {
        $provincias = Provincia::all();
        return view('admin.cliente.create',compact('provincias'));
    }

    public function store(StoreClienteRequest $request)
    {
     
        $user = User::create([
            "name"=>$request->nombres,
            "email"=>$request->correo,
            "password"=>Hash::make($request->celular)
        ]);

        $cliente = Cliente::create([
            "nombres"=>$request->nombres,
            "apellidos"=>$request->apellidos,
            "celular"=>$request->celular,
            "direccion"=>$request->direccion,
            "genero"=>$request->genero,
            "fnacimiento"=>$request->fnacimiento,
            "provincia_id"=>$request->provincia_id,
            "estado_civil"=>$request->estado_civil,
            "estatus"=>$request->estatus,
            "responsable_id"=>auth::id(),
            "user_id"=>$user->id
        ]);

        $cliente->cantones()->attach($request->get('canton_id'),['provincia_id'=>$request->get('provincia_id')]);


        return redirect()->route('cliente.index');
    }

    public function update(UpdateClienteRequest $request, $id)
    {
        $cliente = Cliente::find($id);

        $user_id = $cliente->user->id;
        $user = User::find($user_id);
        $user->update(
            [
            "name"=>$request->nombres,
            // "password"=>Hash::make($request->password)
            ]);

        $cliente->update([
            "nombres"=>$request->nombres,
            "apellidos"=>$request->apellidos,
            "celular"=>$request->celular,
            "direccion"=>$request->direccion,
            "genero"=>$request->genero,
            "fnacimiento"=>$request->fnacimiento,
            "estado_civil"=>$request->estado_civil,
            "estatus"=>$request->estatus,
            // "user_id"=>$request->apellidos,
            // "correo"=>$request->apellidos
        ]);

        return back();
    }

    public function destroy($id)
    {
        Cliente::destroy($id);
        return back();
    }
}

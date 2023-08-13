<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Abogado;
use App\Models\Provincia;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Rules\ValidarCedula;
use Carbon\Carbon;


class ClienteController extends Controller
{

    public function index()
    {
        // $user = User::find(auth::id());
        // if($user->hasRole('Administrador'))
            $clientes = Cliente::all();
        // else if($user->hasRole('Abogado'))
        // {
        //     $abogado = Abogado::where('user_id',auth::id())->first();
        //     $clientes = Cliente::where('responsable_id',auth::id())->get();
        //     // dd($clientes);
        // }else{$clientes='';}

        return view('admin.cliente.index',compact('clientes'));
    }

    public function create()
    {
        $provincias = Provincia::all();
        return view('admin.cliente.create',compact('provincias'));
    }

    public function store(StoreClienteRequest $request)
    {

        $vc = new ValidarCedula;
        $msg1 =  $vc->passes('cedula',$request->cedula);

        if($msg1 == false)
        {
            $campos = [
                'cedula' => 'required',
            ];
            $mensaje = [
                'required' => ':attribute no es valida',
            ];
            $request2 = new Request;
            $request2['cedula'] = '';
            $this->validate($request2, $campos, $mensaje);
        }
        $fechaActual = Carbon::now();
        $fnacimiento = Carbon::parse($request->fnacimiento);
        $diferencia = $fnacimiento->diffInYears($fechaActual);

        if($diferencia < 18)
        {
            $campos = [
                'fnacimiento' => 'required',
            ];
            $mensaje = [
                'required' => 'El cliente debe ser mayor de edad',
            ];
            $request2 = new Request;
            $request2['fnacimiento'] = '';
            $this->validate($request2, $campos, $mensaje);
        }


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
            "correo"=>$request->correo,
            // "user_id"=>$user->id,
            "cedula"=>$request->cedula
        ]);

        $cliente->cantones()->attach($request->get('canton_id'),['provincia_id'=>$request->get('provincia_id')]);

        Alert::toast('Cliente registrado', 'success');
        return redirect()->route('cliente.index');
    }

    public function storeAsync(StoreClienteRequest $request)
    {
        $estadoRes = false;

        // $user = User::create([
        //     "name"=>$request->nombres,
        //     "email"=>$request->correo,
        //     "password"=>Hash::make($request->celular)
        // ]);
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
            "correo"=>$request->correo,
            "responsable_id"=>auth::id(),
            // "user_id"=>$user->id,
            "cedula"=>$request->cedula
        ]);

        $cliente->cantones()->attach($request->get('canton_id'),['provincia_id'=>$request->get('provincia_id')]);

        if(!empty($user) && !empty($cliente))
            $estadoRes = true;
        return $estadoRes;
    }


    public function buscarCliente(Request $request)
    {
        $nombres = explode(" ", $request->get('palabra'));
        // dd($nombres);
        if(count($nombres)>1)
        {
            $clientes = Cliente::where('nombres','LIKE','%'.$nombres[0].'%')->orWhere('apellidos','LIKE','%'.$nombres[1].'%')->get();
        }else
        {
            $clientes = Cliente::where('nombres','LIKE','%'.$nombres[0].'%')->orWhere('apellidos','LIKE','%'.$request->get('palabra').'%')->get();

        }
        return $clientes;
    }

    public function update(UpdateClienteRequest $request, $id)
    {
        $cliente = Cliente::find($id);

        $cliente->update([
            "nombres"=>$request->nombres,
            "apellidos"=>$request->apellidos,
            "celular"=>$request->celular,
            "direccion"=>$request->direccion,
            "genero"=>$request->genero,
            "fnacimiento"=>$request->fnacimiento,
            "estado_civil"=>$request->estado_civil,
            "estatus"=>$request->estatus,
            "correo"=>$request->correo
        ]);

        Alert::toast('Cliente actualizado', 'success');
        return back();
    }

    public function destroy($id)
    {
        Alert::toast('Cliente eliminado', 'success');
        Cliente::destroy($id);
        return back();
    }
}

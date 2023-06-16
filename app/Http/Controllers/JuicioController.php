<?php

namespace App\Http\Controllers;

use App\Models\Juicio;
use App\Models\Abogado;
use App\Models\User;
use App\Models\Cliente;
use App\Models\UnidadJudicial;
use App\Http\Requests\StoreJuicioRequest;
use App\Http\Requests\UpdateJuicioRequest;
use App\Models\Provincia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JuicioController extends Controller
{
    public function index()
    {
        $juicios = Juicio::all();
        // dd($juicios);
        $abogados = Abogado::all();
        $clientes = Cliente::all();
        $unidades = UnidadJudicial::all();
        // dd($juicios[0]->unidad_judicial);
        return view("admin.juicio.index",compact('juicios','abogados','clientes'));
    }

   
    public function create()
    {
        $juicios = Juicio::all();
        $abogados = Abogado::all();
        $clientes = Cliente::all();
        $unidades = UnidadJudicial::all();
        $esAbogado = false;
        $user = User::find(auth::id());
        if($user->hasRole('Abogado'))
        {
            $esAbogado = true;
            $abogados = Abogado::where('user_id',auth::id())->first();// no es array
        }

        $id = Juicio::whereRaw('id = (select max(`id`) from juicios)')->first();
        $id = $id->id;
        $idSiguiente = $id+1;
        $idSiguiente = "JN-".$idSiguiente;
        $provincias = Provincia::all();

        return view('admin.juicio.create',compact('idSiguiente','juicios','esAbogado','abogados','clientes','unidades','provincias'));
    }

    public function store(StoreJuicioRequest $request)
    {
        // dd($request);
        Juicio::create([
            "nro"=>$request->nro,
            "materia"=>$request->materia,
            "estadop"=>$request->estadop,
            "fecha"=>$request->fecha,
            "estatus"=>$request->estatus,
            "abogado_id"=>$request->abogado_id,
            "cliente_id"=>$request->cliente_id,
            "unidad_juidicial_id"=>$request->unidad_id,
        ]);

        return redirect()->route('juicio.index');
    }

    public function update(UpdateJuicioRequest $request, $id)
    {
        $juicio = Juicio::find($id);
        $juicio->update([
            "nro"=>$request->nro,
            "materia"=>$request->materia,
            "estadop"=>$request->estadop,
            "fecha"=>$request->fecha,
            "estatus"=>$request->estatus,
            "abogado_id"=>$request->abogado_id,
            "cliente_id"=>$request->cliente_id,
            // "unidad_juidicial_id"=>$request->unidad_juidicial_id,
        ]);

        return back();

    }

    public function destroy($id)
    {
        Juicio::destroy($id);
        return back();
    }
}

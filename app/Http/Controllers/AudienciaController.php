<?php

namespace App\Http\Controllers;

use App\Models\Audiencia;
use App\Models\Juicio;
use App\Http\Requests\StoreAudienciaRequest;
use App\Http\Requests\UpdateAudienciaRequest;
use App\Models\User;
use App\Models\Abogado;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Evento;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class AudienciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audiencias = Audiencia::all();
        $juicios = Juicio::all();

        $abogado = Abogado::where('user_id',auth::id())->first();
        if(auth()->user()->hasRole('Abogado'))
        {
            $juicios = Juicio::where('abogado_id',$abogado->id)->get();
        }

        return view('admin.audiencia.index',compact('audiencias','juicios'));
    }

    public function calendario()
    {
        $juicios = DB::table('eventos')->get();
        return view('admin.audiencia.calendario',compact('juicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $juicios = Juicio::all();

        $user = User::find(auth::id());
        if($user->hasRole('Abogado'))
        {
            $id = Abogado::where('user_id',auth::id())->first('id');

            $juicios = Juicio::where('abogado_id',$id->id)->get();
        }
        return view('admin.audiencia.create',compact('juicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAudienciaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAudienciaRequest $request)
    {
        $fecha = $request->get('fechahora');
        Audiencia::create([
            "fecha"=>$fecha,
            "observacion"=>$request->get('observacion'),
            "juicio_id"=>$request->get('juicio_id')
        ]);

        $juicio = Juicio::find($request->get('juicio_id'));
        $nroJuicio = $juicio->nro;


        Evento::create([
            "start"=>$fecha,
            "title"=>'Juicio '.$nroJuicio
        ]);

        Alert::toast('Audiencia registrada', 'success');
        return redirect()->route('audiencia.index');
    }

    public function verDetalle(Request $request)
    {
        $id = $request->get('id');
        $juicio = Juicio::find($id);
        $abogado = Abogado::find($juicio->abogado_id);
        $cliente = Cliente::find($juicio->cliente_id);
        $audiencia = Audiencia::where('juicio_id',$juicio->id)->first();
        $data = collect();
        $data->push($juicio);
        $data->push($audiencia);
        $data->push($abogado);
        $data->push($cliente);
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Audiencia  $audiencia
     * @return \Illuminate\Http\Response
     */
    public function show(Audiencia $audiencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Audiencia  $audiencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Audiencia $audiencia)
    {
        //
    }


    public function update(UpdateAudienciaRequest $request, $id)
    {
        $audiencia = Audiencia::find($id);
        $juicio = Juicio::where('id',$request->juicio_id)->first();

        $audiencia->update([
            "fecha"=>$request->fecha,
            "observacion"=>$request->observacion,
            "juicio_id"=>$juicio->id,
        ]);

        // $juicio = Juicio::find($request->juicio_id);
        $juicio->update([
            "nro"=>$juicio->nro,
            "materia"=>$request->materia
        ]);

        Alert::toast('Audiencia actualizada', 'success');
        return back();
    }

    public function destroy(Audiencia $audiencia, $id)
    {
        Audiencia::destroy($id);
        Alert::toast('Audiencia eliminada', 'success');
        return back();
    }
}

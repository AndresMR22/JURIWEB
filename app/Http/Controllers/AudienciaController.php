<?php

namespace App\Http\Controllers;

use App\Models\Audiencia;
use App\Models\Juicio;
use App\Http\Requests\StoreAudienciaRequest;
use App\Http\Requests\UpdateAudienciaRequest;
use App\Models\User;
use App\Models\Abogado;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.audiencia.index',compact('audiencias','juicios'));
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

        return redirect()->route('audiencia.index');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAudienciaRequest  $request
     * @param  \App\Models\Audiencia  $audiencia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAudienciaRequest $request, $id)
    {
        $audiencia = Audiencia::find($id);
        $audiencia->update([
            "fecha"=>$request->fecha,
            "observacion"=>$request->observacion,
            "juicio_id"=>$request->juicio_id,
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Audiencia  $audiencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audiencia $audiencia)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Audiencia;
use App\Http\Requests\StoreAudienciaRequest;
use App\Http\Requests\UpdateAudienciaRequest;

class AudienciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.audiencia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAudienciaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAudienciaRequest $request)
    {
        $fecha = substr($request->get('fechahora'),0,10);
        $hora = substr($request->get('fechahora'),11);
        Audiencia::create([
            "fecha"=>$fecha,
            "hora"=>$hora,
            "observacion"=>$request->get('observacion'),
            "juicio_id"=>$request->get('juicio_id')
        ]);

        return back();
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
    public function update(UpdateAudienciaRequest $request, Audiencia $audiencia)
    {
        //
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

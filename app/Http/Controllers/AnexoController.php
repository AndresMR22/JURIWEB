<?php

namespace App\Http\Controllers;

use App\Models\Anexo;
use App\Http\Requests\StoreAnexoRequest;
use App\Http\Requests\UpdateAnexoRequest;

class AnexoController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAnexoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnexoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anexo  $anexo
     * @return \Illuminate\Http\Response
     */
    public function show(Anexo $anexo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anexo  $anexo
     * @return \Illuminate\Http\Response
     */
    public function edit(Anexo $anexo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnexoRequest  $request
     * @param  \App\Models\Anexo  $anexo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnexoRequest $request, Anexo $anexo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anexo  $anexo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anexo $anexo)
    {
        //
    }
}

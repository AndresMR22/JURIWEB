<?php

namespace App\Http\Controllers;

use App\Models\Canton;
use App\Http\Requests\StoreCantonRequest;
use App\Http\Requests\UpdateCantonRequest;

class CantonController extends Controller
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
     * @param  \App\Http\Requests\StoreCantonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCantonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Canton  $canton
     * @return \Illuminate\Http\Response
     */
    public function show(Canton $canton)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Canton  $canton
     * @return \Illuminate\Http\Response
     */
    public function edit(Canton $canton)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCantonRequest  $request
     * @param  \App\Models\Canton  $canton
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCantonRequest $request, Canton $canton)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Canton  $canton
     * @return \Illuminate\Http\Response
     */
    public function destroy(Canton $canton)
    {
        //
    }
}

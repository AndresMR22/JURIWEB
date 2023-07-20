<?php

namespace App\Http\Controllers;

use App\Models\UnidadJudicial;
use App\Http\Requests\StoreUnidadJudicialRequest;
use App\Http\Requests\UpdateUnidadJudicialRequest;
use RealRashid\SweetAlert\Facades\Alert;

class UnidadJudicialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidades = UnidadJudicial::all();
        return view('admin.unidad.index',compact('unidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.unidad.create');
    }

    public function store(StoreUnidadJudicialRequest $request)
    {
        UnidadJudicial::create($request->all());
        Alert::toast('Unidad Judicial registrada', 'success');
        return redirect()->route('unidad.index');
    }

    public function update(UpdateUnidadJudicialRequest $request, $id)
    {
        $unidad = UnidadJudicial::find($id);
        $unidad->update([
            "nombre"=>$request->nombre,
            "ubicacion"=>$request->ubicacion,
            "direccion"=>$request->direccion
        ]);
        Alert::toast('Unidad Judicial actualizada', 'success');
        return back();
    }

    public function destroy($id)
    {
        UnidadJudicial::destroy($id);
        Alert::toast('Unidad Judicial eliminada', 'success');
        return back();
    }
}

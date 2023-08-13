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
use Carbon\Carbon;


class AudienciaController extends Controller
{
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

    public function store(StoreAudienciaRequest $request)
    {
        $fecha = $request->get('fechahora');
        $existe = $this->existeYaAudiencia($fecha);

        if($existe)
        {
            Alert::toast('Ya existe una audiencia para esa fecha', 'info');
            return back();
        }


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

    public function existeYaAudiencia($fecha1)
    {
        $audiencias = Audiencia::all();

        $fecha1 = Carbon::parse($fecha1);
        $fecha1 = $fecha1->format('Y-m-d');
        $band = false;
        foreach($audiencias as $audiencia)
        {
            $fecha = Carbon::parse($audiencia->fecha);
            $fecha = $fecha->format('Y-m-d');
            if($fecha == $fecha1)
            {
                $band = true;
            }
        }
        return $band;
    }

    public function verDetalle(Request $request)
    {
        $id = $request->get('id');
        $hora = $request->get('hora');
        $juicio = Juicio::find($id);
        $abogado = Abogado::find($juicio->abogado_id);
        $cliente = Cliente::find($juicio->cliente_id);
        // dd($hora);
        $audiencia = DB::select('select * from audiencias where DATE_FORMAT(fecha, "%H:%i") = ? and juicio_id = ? ',[$hora, $id]);
        $data = collect();
        $data->push($juicio);
        $data->push($audiencia[0]);
        $data->push($abogado);
        $data->push($cliente);
        return $data;
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

        $audiencia = Audiencia::find($id);
        $fecha = Carbon::parse($audiencia->fecha);
        $fecha = $fecha->format('Y-m-d H:i:s');
        DB::table('eventos')->where('start', $fecha)->delete();
        Audiencia::destroy($id);
        Alert::toast('Audiencia eliminada', 'success');
        return back();
    }
}

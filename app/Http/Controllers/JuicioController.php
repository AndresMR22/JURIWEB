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
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use PDF;
use App\Models\Evento;


class JuicioController extends Controller
{

    public function avancesByJuicio(Request $request)
    {
        $archivos = null;
        $juicio = Juicio::find($request->juicio_id);
        $cliente = $juicio->cliente()->first();
        $unidad = UnidadJudicial::find($juicio->unidad_juidicial_id);
        $archivos = $juicio->archivos()->get();
        $info = array();
        array_push($info,['juicio'=>$juicio,'cliente'=>$cliente,'unidad'=>$unidad,'archivos'=>$archivos]);
        return $info;
    }

    public function avancesByJuicio2($juicio_id)
    {
        $archivos = null;
        $juicio = Juicio::find($juicio_id);
        $cliente = $juicio->cliente()->first();
        $unidad = UnidadJudicial::find($juicio->unidad_juidicial_id);
        $archivos = $juicio->archivos()->get();
        return view('admin.juicio.seguimiento',compact('juicio','unidad','archivos'));
    }

    public function searchByCedula($cedula)
    {
        $clientes = Cliente::where('cedula',$cedula)->get();
        $juiciosTotal = collect();
        foreach($clientes as $cliente)
        {
            foreach($cliente->juicios as $juicio)
            {
                $cliente = Cliente::find($cliente->id);
                $juicio->setAttribute('cliente',$cliente);
                $juiciosTotal->push($juicio);
            }
        }
        return $juiciosTotal;
    }

    public function searchByNombre($nombres)
    {
        // $nombres = "a ve";
        $data_nombres = explode(' ',$nombres);
        $nombre = isset($data_nombres[0]) ? $data_nombres[0] : 'xyz';
        $apellido = isset($data_nombres[1]) ? $data_nombres[1] : 'xyz' ;
        $clientes = Cliente::where('nombres','like',$nombre.'%')->orWhere('apellidos','like',$apellido.'%')->get();
        $juiciosTotal = collect();

        foreach($clientes as $cliente)
        {
            foreach($cliente->juicios as $juicio)
            {
                $cliente = Cliente::find($cliente->id);
                $juicio->setAttribute('cliente',$cliente);
                $juiciosTotal->push($juicio);
            }
        }

        return $juiciosTotal;
    }

    public function buscarSeguimiento(Request $request)
    {
        $nombres = $request->get('nombres');
        $data_nombres = explode(' ',$nombres);
        $nombre = isset($data_nombres[0]) ? $data_nombres[0] : '';
        $apellido = isset($data_nombres[1]) ? $data_nombres[1] : '' ;
        $cedula = $request->get('cedula');
        $juicio = $request->get('nro_juicio');
        if(strlen($juicio)>=3)//JN- 3 caracteres o más, quitamos los 3 primeros caracteres
        {
            //$juicio = substr($juicio, 3);
            $juicios = Juicio::where('nro',strtoupper($juicio))->get();
        }else
        {
            $juicios = Juicio::where('nro','JN-'.$juicio)->get();
        }


        foreach($juicios as $juicio)
        {
            $cliente = Cliente::where('id',$juicio->cliente_id)->first();
            $juicio->setAttribute('cliente',$cliente);
        }

        if($nombres != null && !isset($juicios[0]))
        {
            $juicios = $this->searchByNombre($nombres);
        }elseif($cedula != null && !isset($juicios[0]))
        {
            $juicios = $this->searchByCedula($cedula);
        }
        return view('admin.juicio.resultados_busqueda',compact('juicios'));
    }

    public function busquedaSeguimiento()
    {
        return view('admin.juicio.busqueda_seguimiento');
    }

    public function generarReporteSeguimiento(Request $request)
    {

        $juicio = Juicio::find($request->juicio_id);
        $abogado = Abogado::where('id',$juicio->abogado_id)->first();
        $cliente = $juicio->cliente()->first();
        $unidad = UnidadJudicial::find($juicio->unidad_juidicial_id);
        $archivos = $juicio->archivos()->get();
        $pdf = PDF::loadView('admin.pdf.seguimiento', compact('juicio','cliente','unidad','archivos','abogado')); // se carga la data en la plantilla
        return $pdf->stream('Reporte de seguimiento.pdf'); //retorna el pdf con el nombre compra_creditos.pdf
    }

    // public function acortarurl($url){
    //     $longitud = strlen($url);
    //     if($longitud > 45){
    //         $longitud = $longitud - 30;
    //         $parte_inicial = substr($url, 0, -$longitud);
    //         $parte_final = substr($url, -15);
    //         $nueva_url = $parte_inicial."[ ... ]".$parte_final;
    //         return $nueva_url;
    //     }else{
    //         return $url;
    //     }
    // }

    public function seguimiento()
    {
        $juicios = Juicio::all();
        if(auth()->user()->hasRole('Abogado'))
        {
            $user = User::find(auth::id());
            $abogado = Abogado::where('user_id',$user->id)->first();
            $juicios = Juicio::where('abogado_id',$abogado->id)->get();
        }
        return view('admin.juicio.seguimiento',compact('juicios'));
    }

    public function index()
    {
        $juicios = Juicio::all();

        if(auth()->user()->hasRole('Abogado'))
        {
            $abogado = Abogado::where('user_id',auth::id())->first();
            $juicios = Juicio::where('abogado_id',$abogado->id)->get();
        }

        $abogados = Abogado::all();
        $clientes = Cliente::all();
        $unidades = UnidadJudicial::all();
        // dd($juicios[0]->unidad_judicial);
        return view("admin.juicio.index",compact('juicios','abogados','clientes'));
    }

    public function cargarAvance(Request $request)
    {
        if ($request->hasFile('file'))
        {
            $juicio = Juicio::find($request->juicio_id);
            $file = $request->file('file');
            $extension = $request->file('file')->extension();
            // dd($extension);
            if ($extension == "png" || $extension == "jpg" || $extension == "jpeg" || $extension == "gif" || $extension == "pdf")
            {
                $this->validate($request, [
                    'file'   => 'required',
                    'file' => 'mimes:png,jpg,jpeg,gif,pdf',
                    'fecha'=>'required|date'
                ],[
                    'file.required'=>'La imagen es requerida',
                    'file.image'=>'El archivo tienen que ser una imagen, o extension de documento permitida (jpg,jpeg,gif,pdf)',
                    'file.mimes'=>'La imagen debe ser tipo png, jpg o jpeg',
                    'fecha.required'=>'La fecha es requerida',
                    'fecha.date'=>'La fecha no tiene el formato adecuado'
                    // 'file.dimensions'=>'La imagen no cumple con las dimensiones 800x200 mínimo; 1800x600 máximo',
                    // 'file.max'=>'La imagen supera el peso permitido (1Megabyte)'
                ]);

                $elemento = Cloudinary::upload($file->getRealPath(), ['folder' => 'anexos']);
                $public_id = $elemento->getPublicId();
                $url = $elemento->getSecurePath();
                $juicio->archivos()->create([
                    'url' => $url,
                    'public_id'=>$public_id,
                    'observacion'=>$request->observacion,
                    'fecha'=>$request->fecha,
                ]);
            }
            elseif($extension == "pdf" || $extension == "docx" || $extension == "xls" || $extension == "xlsx")
            {
                $this->validate($request, [
                    'file'   => 'required',
                    'file' => 'mimes:docx,pdf,xls,xlsx',
                    'fecha'=>'required|date'
                ],[
                    'file.required'=>'La imagen es requerida',
                    'file.image'=>'El archivo tienen que ser una imagen, o extension de documento permitida (pdf,docx,xls,xlsx)',
                    'file.mimes'=>'La imagen debe ser tipo png, jpg o jpeg',
                    'fecha.required'=>'La fecha es requerida',
                    'fecha.date'=>'La fecha no tiene el formato adecuado'
                    // 'file.dimensions'=>'La imagen no cumple con las dimensiones 800x200 mínimo; 1800x600 máximo',
                    // 'file.max'=>'La imagen supera el peso permitido (1Megabyte)'
                ]);

                $elemento = Cloudinary::uploadFile($file->getRealPath(), ['folder' => 'anexos'],['resource_type'=>'raw']);
                $public_id = $elemento->getPublicId();
                $url = $elemento->getSecurePath();
                $juicio->archivos()->create([
                    'url' => $url,
                    'public_id'=>$public_id,
                    'observacion'=>$request->observacion,
                    'fecha'=>$request->fecha,
                ]);
            }
            else
            {
                $this->validate($request,[
                    'file' =>'mimetypes:video/mp4,video|max:6000',
                    'fecha'=>'required|date'
                ],[
                    'file.mp4'=>'El video debe ser tipo mp4',
                    'file.max'=>'El video es muy pesado',
                    'fecha.required'=>'La fecha es requerida',
                    'fecha.date'=>'La fecha no tiene el formato adecuado'
                ]);
                $elemento = Cloudinary::uploadVideo($file->getRealPath(), ['folder' => 'anexos']);
                  $public_id = $elemento->getPublicId();
                $url = $elemento->getSecurePath();
                $juicio->archivos()->create([
                    'url' => $url,
                    'public_id'=>$public_id,
                    'observacion'=>$request->observacion,
                    'fecha'=>date('Y-m-d h:i:s')
                ]);
            }
        }

        Alert::toast('Avance registrado', 'success');
        return back();
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

    public function calendario()
    {
        $juicios = DB::table('eventos')->get();
        // dd($juicios);
        return view('admin.juicio.calendario',compact('juicios'));
    }

    public function store(StoreJuicioRequest $request)
    {
        Juicio::create([
            "nro"=>$request->nro,
            "materia"=>$request->materia,
            "estadop"=>$request->estadop,
            "fecha"=>$request->fecha,
            "abogado_id"=>$request->abogado_id,
            "cliente_id"=>$request->cliente_id,
            "unidad_juidicial_id"=>$request->unidad_id,
        ]);

        Evento::create([
            "start"=>$request->fecha,
            // "end"=>$request->fecha_fin,
            "title"=>$request->estadop
        ]);

        Alert::toast('Juicio registrado', 'success');
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
            // "estatus"=>$request->estatus,
            // "abogado_id"=>$request->abogado_id,
            "cliente_id"=>$request->cliente_id,
            // "unidad_juidicial_id"=>$request->unidad_juidicial_id,
        ]);

        Alert::toast('Juicio actualizado', 'success');
        return back();

    }

    public function cambiarEstado($juicio_id)
    {
        $juicio = Juicio::find($juicio_id);
        $estadoActual = $juicio->estatus;
        if($estadoActual=="1")
            $juicio->update(['estatus'=>"2"]);
        else if($estadoActual=="2")
            $juicio->update(['estatus'=>"3"]);
        else if($estadoActual=="3")
            $juicio->update(['estatus'=>"1"]);

        Alert::toast('Estado cambiado', 'info');
        return back();
    }

    public function destroy($id)
    {
        Juicio::destroy($id);
        Alert::toast('Juicio eliminado', 'success');
        return back();
    }
}

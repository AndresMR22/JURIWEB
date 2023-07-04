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
use Illuminate\Http\Request;

class JuicioController extends Controller
{
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
            if ($extension == "png" || $extension == "jpg" || $extension == "jpeg" || $extension == "gif" || $extension == "pdf" || $extension == "docx" || $extension == "xls" || $extension == "xlsx")
            {

                $this->validate($request, [
                    'file'   => 'required',
                    'file' => 'mimes:png,jpg,jpeg,gif,docx,pdf,xls,xlsx',
                ],[
                    'file.required'=>'La imagen es requerida',
                    'file.image'=>'El archivo tienen que ser una imagen, o extension de documento permitida (jpg,jpeg,gif,pdf,docx,xls,xlsx)',
                    'file.mimes'=>'La imagen debe ser tipo png, jpg o jpeg',
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
                    'fecha'=>date('Y-m-d h:i:s')
                ]);
            }
            else
            {
                $this->validate($request,[
                    'file' =>'mimetypes:video/mp4,video|max:6000'
                ],[
                    'file.mp4'=>'El video debe ser tipo mp4',
                    'file.max'=>'El video es muy pesado'
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

    public function store(StoreJuicioRequest $request)
    {
        // dd($request);
        Juicio::create([
            "nro"=>$request->nro,
            "materia"=>$request->materia,
            "estadop"=>$request->estadop,
            "fecha"=>$request->fecha,
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
            // "estatus"=>$request->estatus,
            // "abogado_id"=>$request->abogado_id,
            "cliente_id"=>$request->cliente_id,
            // "unidad_juidicial_id"=>$request->unidad_juidicial_id,
        ]);

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
        return back();
    }

    public function destroy($id)
    {
        Juicio::destroy($id);
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Abogado;
use App\Models\Empresa;
use App\Models\Cliente;
use App\Models\Juicio;
use App\Models\UnidadJudicial;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreAbogadoRequest;
use App\Http\Requests\UpdateAbogadoRequest;
use Illuminate\Http\Request;
use App\Rules\ValidarCedula;
use App\Rules\ValidarCedulaRepetidaAbogado;
use RealRashid\SweetAlert\Facades\Alert;

class AbogadoController extends Controller
{

    public function verJuicios(Request $request)
    {
        $abogado = Abogado::find($request->get('idAbogado'));
        $juicios = $abogado->juicios()->get();
        foreach($juicios as $juicio)
        {
            $idCliente = $juicio->cliente_id;
            $idUnidad = $juicio->unidad_juidicial_id;
            $cliente = Cliente::find($idCliente);
            $unidad = UnidadJudicial::find($idUnidad);
            $juicio->setAttribute('cliente',$cliente);
            $juicio->setAttribute('unidad',$unidad);
        }
        return $juicios;
    }

    public function reasignarJuicioStore(Request $request)
    {
        // dd($request);
        $id_abogado_inactivo = $request->get('abogado_inactivo');
        $id_abogado_activo = $request->get('abogado_activo');

        $campos = [
            'abogado_inactivo' => 'required',
            'abogado_activo' => 'required',
        ];
        $mensaje = [
            'required' => ':attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

       // dd($id_abogado_activo, $id_abogado_inactivo);

        $juicios_abg_ina = Juicio::where('abogado_id',$id_abogado_inactivo)->get();
       // dd($juicios_abg_ina);
        foreach($juicios_abg_ina as $juicio)
        {
            $juicio->update([
                "abogado_id"=>$id_abogado_activo
            ]);
        }
        Alert::toast('Juicios Reasignados', 'success');
        return back();
    }

    public function index()
    {
        $abogados = Abogado::all();
        $empresas = Empresa::all();
        return view('admin.abogado.index',compact('abogados','empresas'));
    }

    public function perfilAbogado()
    {

        return view('admin.abogado.perfil');
    }

    public function reasignarJuicio()
    {
        $abogadosactivos = Abogado::where('estatus','1')->get();
        $abogadosinactivos = Abogado::where('estatus','2')->get();
        $juicios = Juicio::where('estatus','1')->orWhere('estatus','2')->get();
        return view('admin.abogado.reasignarJuicio',compact('abogadosactivos','abogadosinactivos','juicios'));
    }

    public function editarPerfil(Request $request)
    {
        if($request->password != $request->password_confirm)
        {
            Alert::toast('Contraseñas no coinciden', 'info');
            return back();
        }

        $this->validate($request, [
            'password'   => 'required',
            'password_confirm' => 'required'
        ],[
            'password.required'=>'La contraseña es requerida',
            'password_confirm.required'=>'La contraseña de confirmación es requerida',
            // 'file.dimensions'=>'La imagen no cumple con las dimensiones 800x200 mínimo; 1800x600 máximo',
            // 'file.max'=>'La imagen supera el peso permitido (1Megabyte)'
        ]);

        $user = User::find(auth()->user()->id);
        $user->update(
            [
            "password"=>Hash::make($request->password)
            ]);

        Alert::toast('Contraseña actualizada', 'success');
        return back();
    }


    public function create()
    {
        $empresas = Empresa::all();
        return view('admin.abogado.create',compact('empresas'));
    }


    public function store(StoreAbogadoRequest $request)
    {

        $vc = new ValidarCedula;
        $msg1 =  $vc->passes('cedula',$request->cedula);

        if($msg1 == false)
        {
            $campos = [
                'cedula' => 'required',
            ];
            $mensaje = [
                'required' => ':attribute no es valida',
            ];
            $request2 = new Request;
            $request2['cedula'] = '';
            $this->validate($request2, $campos, $mensaje);
        }

        $user = User::create([
            "email"=>$request->correo,
            "name"=>$request->nombres,
            "password"=>Hash::make($request->celular)
        ]);

        $user->assignRole('Abogado');




        Abogado::create([
            "nombres"=>$request->nombres,
            "apellidos"=>$request->apellidos,
            "celular"=>$request->celular,
            "direccion"=>$request->direccion,
            "genero"=>$request->genero,
            // "estatus"=>$request->estatus,
            "empresa_id"=>$request->empresa_id,
            "user_id"=>$user->id,
            "cedula"=>$request->cedula
        ]);

        Alert::toast('Abogado registrado', 'success');
        return redirect()->route('abogado.index');
    }

    public function cambiarEstado($abogado_id)
    {
        $abogado = Abogado::find($abogado_id);
        if($abogado->estatus == "1")
            $abogado->update(["estatus"=>"2"]);
        else
            $abogado->update(["estatus"=>"1"]);

        Alert::toast('Estado actualizado', 'info');
        return back();
    }

    public function validarCedula(Request $request)
    {
        $msg1 = null; $msg2 = null;
        $cedula = !empty($request->get('cedula')) ? $request->get('cedula') : '';
        $vc = new ValidarCedula;
        $msg1 =  $vc->passes('cedula',$cedula);
        $vcr = new ValidarCedulaRepetidaAbogado;
        $msg2 = $vcr->passes('cedula',$cedula);

        //logica para validar cedula
        return [$msg1,$msg2];
    }

    public function update(UpdateAbogadoRequest $request, $id)
    {
        $abogado = Abogado::find($id);

        $user_id = $abogado->user->id;
        $user = User::find($user_id);
        $user->update(
            [
            "name"=>$request->nombres,
            "email"=>$request->correo
            // "password"=>Hash::make($request->password)
            ]);


        $abogado->update([
            // "cedula"=>$request->cedula,
            "nombres"=>$request->nombres,
            "apellidos"=>$request->apellidos,
            "celular"=>$request->celular,
            "direccion"=>$request->direccion,
            "genero"=>$request->genero,
            // "estatus"=>$request->estatus,
            "empresa_id"=>$request->empresa_id
        ]);
        Alert::toast('Abogado actualizado', 'success');
        return back();
    }


    public function destroy($id)
    {
        Abogado::destroy($id);
        Alert::toast('Abogado eliminado', 'success');
        return back();
    }
}

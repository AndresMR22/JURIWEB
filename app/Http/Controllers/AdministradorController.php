<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Administrador;
use App\Http\Requests\StoreAdministradorRequest;
use App\Http\Requests\UpdateAdministradorRequest;

class AdministradorController extends Controller
{

    public function index()
    {
        $administradores = Administrador::all();

        return view("admin.administrador.index",compact('administradores'));
    }

    public function create()
    {
        return view('admin.administrador.create');
    }

    public function store(StoreAdministradorRequest $request)
    {
        $user = User::create([
            "name"=>$request->username,
            "email"=>$request->email,
            "password"=>Hash::make($request->password)
        ]);

        Administrador::create([
            "user_id"=>$user->id
        ]);

        return redirect()->route('administrador.index');
    }

    public function update(UpdateAdministradorRequest $request, $id)
    {
        $admin = Administrador::find($id);
        $user_id = $admin->user->id;
        $user = User::find($user_id);
        $user->update(
            [
            "name"=>$request->username,
            "password"=>Hash::make($request->password)
            ]
        );
        return back();
    }

    public function destroy($id)
    {
        Administrador::destroy($id);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Empresa;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{

    public function run()
    {
        Role::create(["name"=>"Administrador"]);
        Role::create(["name"=>"Abogado"]); // este sera el abogado
        Role::create(["name"=>"Cliente"]); // este sera el cliente
        
        $empresa = Empresa::create([
            "razon"=>"Sistema Judicial JuriWeb",
            "direccion"=>"av. 234",
            "celular"=>"0988703045",
            "correo"=>"juriweb@gmail.com"
        ]);

        //Creación Administrador

        $user1 = User::create([
            "name"=>"Andres",
            "email"=>"admin@gmail.com",
            "password"=>'$2y$10$Ztoy.56ZbM.7kfG60rosJuERbO4I5HDnBceACPNs7SVgADd9Xw62m'//morales98
        ]);
        $user1->assignRole('Administrador');//Asignacion del rol Administrador
        $admin = $user1->administradores()->create([
            "user_id"=>$user1->id,
        ]);


        //Creación Abogado
        $user2 = User::create([
            "name"=>"Junior",
            "email"=>"abogado@gmail.com",
            "password"=>'$2y$10$Ztoy.56ZbM.7kfG60rosJuERbO4I5HDnBceACPNs7SVgADd9Xw62m'
        ]);
        $user2->assignRole('Abogado');//Asignacion del rol Abogado
        $nutri = $user2->abogados()->create([
            "nombres"=>"Junior",
            "apellidos"=>"Moreira",
            "celular"=>"0988703045",
            "direccion"=>"av. 123",
            "genero"=>"Masculino",
            "estatus"=>"1",
            "empresa_id"=>$empresa->id,
            "user_id"=>$user2->id,
            "cedula"=>"2100463187"
        ]);


                //Creación Cliente
        $user3 = User::create([
            "name"=>"Michael",
            "email"=>"cliente@gmail.com",
            "password"=>'$2y$10$Ztoy.56ZbM.7kfG60rosJuERbO4I5HDnBceACPNs7SVgADd9Xw62m'
        ]);
        $user3->assignRole('Cliente');//Asignación Rol Cliente
        $cliente = $user3->clientes()->create([
            "nombres"=>"Michael",
            "apellidos"=>"Vera",
            "celular"=>"0988703045",
            "direccion"=>"Av. Guayas",
            "genero"=>"Masculino",
            "fnacimiento"=>"1998-03-12 12:49:00",
            "estado_civil"=>"soltero",
            // "estatus"=>"A",
            "provincia_id"=>1,
            "responsable_id"=>1,
            "user_id"=>$user3->id,
            "cedula"=>"0101415052"
        ]);
      
    }
}
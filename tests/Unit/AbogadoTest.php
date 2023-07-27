<?php

namespace Tests\Unit;

use App\Providers\RouteServiceProvider;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan as Artisan;
use Spatie\Permission\Models\Role;
use App\Models\Empresa;


class AbogadoTest extends TestCase
{

    public function test_crear_abogado()
    {
        Artisan::call('migrate');
        //1---- Test para carga del formulario de Registro ------------//
        $formulario = $this->get(route('register'));
        $formulario->assertStatus(200);

        //2----------- Test de registro de user -------------------//
        $registro = $this->post(route('register'),
        [
            "email"=>"userlogin@gmail.com",
            "name"=>"User Prueba",
            "password_confirmation"=>"morales98",
            "password"=>"morales98",
            "remember_token"=>""
        ]);
        $registro->assertStatus(302)->assertRedirect(route('home'));//En caso de el usuario ser registrado con exito, el programa emite un redirect

        //3----------- Test de login de usuario -------------------//
        $login = $this->post(route('login'),
        [
            "name"=>"User Prueba",
            "email"=>"userlogin@gmail.com",
            "password"=>"morales98"
        ]);
        $login->assertStatus(302)->assertRedirect(route('home'));//En caso de que las credenciales sean correctas, redirige a ruta home, es decir dashboard.

        //4----------- Test de registro de Administrador -------------------//
        Role::create(["name"=>"Abogado"]); // este sera el abogado
        Empresa::create([
            "razon"=>"Sistema Judicial JuriWeb",
            "direccion"=>"av. 234",
            "celular"=>"0988703045",
            "correo"=>"juriweb@gmail.com"
        ]);
        $abogado = $this->post(route('abogado.store'),
        [
            "correo"=>"abogado@gmail.com",
            "nombres"=>"Abogado Prueba",
            "celular"=>"0988703045",
            "apellidos"=>"Apellido Prueba",
            "direccion"=>"Av. 123",
            "genero"=>"Masculino",
            "empresa_id"=>"1",
            "cedula"=>"2100463187",
        ]);
        $abogado->assertStatus(302)->assertRedirect(route('abogado.index'));
        //assertStatus: Para saber si hay una redireccion al intentar crear la unidad
        //En caso que la redireccion se realice (es decir, sea 302) entonces pasa al siguiente assert
        //assertRedirect: Para saber si la ruta a la cual redirige es a login o unidad.index

        //------------ Test para saber si la audiencia esta en base de datos - Memoria SQLite. --- //

        $this->assertDatabaseHas('abogados',['nombres'=>'Abogado Prueba']);
        //assertDatabaseHas: Permite consultar en la tabla en memoria si se encuentra registrada la audiencia con
        //nombre name test. Para ello es necesario asegurarse que en web.php la la ruta de store de unidad este
        //fuera de cualquier middleware. Caso contrario indicara que la tabla esta vacia ya que es necesario
        //estar logueado.

        //5------------ Test de eliminacion de Unidad Judicial -------------------//
        $this->delete(route('abogado.destroy',1));//se elimina la unidad de la tabla unidad_judicials
        $this->assertDatabaseMissing("abogados", ['nombres'=>'Abogado Prueba']);//se pregunta si el nombre name test esta en la tabla

    }
}

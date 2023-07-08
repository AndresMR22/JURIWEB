<?php

namespace Tests\Unit;

use App\Providers\RouteServiceProvider;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan as Artisan;


class UnidadJudicialTest extends TestCase
{

    public function test_crear_unidad_judicial()
    {
        Artisan::call('migrate');
        //1---- Test para carga del formulario de Registro ------------//
        $formulario = $this->get(route('register'));
        $formulario->assertStatus(200);

        //2----------- Test de registro de usuario -------------------//
        $registro = $this->post(route('register'),
        [
            "email"=>"admin@gmail.com",
            "name"=>"Andres",
            "password_confirmation"=>"morales98",
            "password"=>"morales98",
            "remember_token"=>""
        ]);
        $registro->assertStatus(302)->assertRedirect(route('home'));//En caso de el usuario ser registrado con exito, el programa emite un redirect

        //3----------- Test de login de usuario -------------------//
        $login = $this->post(route('login'),
        [
            "name"=>"Andres",
            "email"=>"admin@gmail.com",
            "password"=>"morales98"
        ]);
        $login->assertStatus(302)->assertRedirect(route('home'));//En caso de que las credenciales sean correctas, redirige a ruta home, es decir dashboard.


        //4----------- Test de registro de Unidad Judicial -------------------//
        $unidad = $this->post(route('unidad.store'),
        [
            "nombre"=>"name test",
            "direccion"=>"direccion test",
            "ubicacion"=>"ubicacion test"
        ]);
        $unidad->assertStatus(302)->assertRedirect(route('unidad.index'));
        //assertStatus: Para saber si hay una redireccion al intentar crear la unidad
        //En caso que la redireccion se realice (es decir, sea 302) entonces pasa al siguiente assert
        //assertRedirect: Para saber si la ruta a la cual redirige es a login o unidad.index

        //------------ Test para saber si la audiencia esta en base de datos - Memoria SQLite. --- //

        $this->assertDatabaseHas('unidad_judicials',['nombre'=>'name test']);
        //assertDatabaseHas: Permite consultar en la tabla en memoria si se encuentra registrada la audiencia con
        //nombre name test. Para ello es necesario asegurarse que en web.php la la ruta de store de unidad este
        //fuera de cualquier middleware. Caso contrario indicara que la tabla esta vacia ya que es necesario
        //estar logueado.

        //5------------ Test de eliminacion de Unidad Judicial -------------------//
        $this->delete(route('unidad.destroy',1));//se elimina la unidad de la tabla unidad_judicials
        $this->assertDatabaseMissing("unidad_judicials", ['nombre'=>'name test']);//se pregunta si el nombre name test esta en la tabla

    }
}

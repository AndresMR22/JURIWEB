<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AbogadoController;
use App\Http\Controllers\AudienciaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UnidadJudicialController;
use App\Http\Controllers\JuicioController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['middleware' => 'admin'], function () {
        Route::resource('audiencia', AudienciaController::class)->only(['index']);
        Route::resource('cliente', ClienteController::class)->only(['index']);
        Route::resource('juicio', JuicioController::class);

        Route::resource('administrador', AdministradorController::class);
        Route::resource('abogado', AbogadoController::class);
        Route::resource('unidad', UnidadJudicialController::class);//Comentar en caso de querer probar Prueba Unitaria. (UnidadJudicialTest.php)
        Route::get('abogado/cambiar_estado/{abogado_id}', [AbogadoController::class,'cambiarEstado'])->name('abogado.cambiarEstado');

    });

    Route::group(['middleware' => 'abogado'], function () {
        Route::resource('audiencia', AudienciaController::class);
        Route::resource('cliente', ClienteController::class);
        Route::resource('juicio', JuicioController::class);

        Route::get('juicio/cambiar_estado/{juicio_id}', [JuicioController::class,'cambiarEstado'])->name('juicio.cambiarEstado');
        Route::get('juicio/finalizar_juicio/{juicio_id}', [JuicioController::class,'finalizarJuicio'])->name('juicio.finalizarJuicio');

        Route::get('/buscarClientes', [ClienteController::class,'buscarCliente'])->name('cliente.buscarCliente');
        Route::post('/cargar_avance',[JuicioController::class,'cargarAvance'])->name('juicio.cargarAvance');
    });

    Route::group(['middleware' => ['adminabogado']], function () {
        Route::get('/audiencia', [AudienciaController::class,'index'])->name('audiencia.index');
        Route::get('/cliente', [ClienteController::class,'index'])->name('cliente.index');
        Route::get('/juicio', [JuicioController::class,'index'])->name('juicio.index');
        Route::get('/seguimiento',[JuicioController::class,'seguimiento'])->name('juicio.seguimiento');
        Route::get('/busqueda_seguimiento', [JuicioController::class,'busquedaSeguimiento'])->name('juicio.busquedaSeguimiento');
        Route::get('/calendario',[AudienciaController::class,'calendario'])->name('audiencia.calendario');
        Route::get('/ver_detalle/audiencia',[AudienciaController::class,'verDetalle'])->name('audiencia.verDetalle');
        Route::get('/juicioByStatus/{status}',[JuicioController::class,'juicioByStatus'])->name('juicio.juicioByStatus');

        Route::post('/busqueda_seguimiento/buscar', [JuicioController::class,'buscarSeguimiento'])->name('juicio.buscarSeguimiento');

        //------------RUTAS AJAX-------------------//
        Route::get('/validarCedula', [AbogadoController::class,'validarCedula'])->name('abogado.validarCedula');
        Route::get('/cantonesByProvincia', [ProvinciaController::class,'cantonesByProvincia'])->name('provincia.cantonesByProvincia');
        Route::get('/avancesByJuicio', [JuicioController::class,'avancesByJuicio'])->name('juicio.avancesByJuicio');
        Route::get('/avances/{juicio_id}', [JuicioController::class,'avancesByJuicio2'])->name('juicio.avancesByJuicio2');

        Route::post('/generarPdfSeguimiento', [JuicioController::class,'generarReporteSeguimiento'])->name('juicio.generarReporteSeguimiento');

    });

    // Route::group(['middleware' => 'cliente'], function () {
    // });

    Route::get('/crearCliente', [ClienteController::class,'storeAsync'])->name('cliente.storeAsync');


    // --- Descomentar para prueba unitaria de Unidad Judicial y comentar en caso de no hacer pruebas



    // Route::group(['middleware' => 'auth'], function () {
    //      Route::resource('unidad',UnidadJudicialController::class);
    //  });


});

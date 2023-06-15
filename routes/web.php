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

Route::group(['prefix' => 'dashboard'], function()
{

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['middleware' => 'admin'], function()
    {
    Route::resource('administrador', AdministradorController::class);
    Route::resource('abogado',AbogadoController::class);
    Route::resource('unidad',UnidadJudicialController::class);
    });

    Route::group(['middleware' => ['adminabogado']], function()
    {
        Route::resource('audiencia',AudienciaController::class);
        Route::resource('cliente',ClienteController::class);
        Route::resource('juicio',JuicioController::class);

        //RUTAS AJAX
        //BUSCAR CANTONES POR PROVINCIA
        Route::get('/validarCedula',[AbogadoController::class,'validarCedula'])->name('abogado.validarCedula');
        Route::get('/cantonesByProvincia',[ProvinciaController::class,'cantonesByProvincia'])->name('provincia.cantonesByProvincia');
        Route::get('/buscarClientes',[ClienteController::class,'buscarCliente'])->name('cliente.buscarCliente');
        
    });

    Route::group(['middleware' => 'cliente'], function()
    {
    });
    Route::get('/crearCliente',[ClienteController::class,'storeAsync'])->name('cliente.storeAsync');

});

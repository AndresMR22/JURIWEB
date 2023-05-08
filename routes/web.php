<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AbogadoController;
use App\Http\Controllers\AudienciaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UnidadJudicialController;
use App\Http\Controllers\JuicioController;
use App\Http\Controllers\ProvinciaController;

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

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('administrador', AdministradorController::class);
Route::resource('abogado',AbogadoController::class);
Route::resource('audiencia',AudienciaController::class);
Route::resource('cliente',ClienteController::class);
Route::resource('unidad',UnidadJudicialController::class);
Route::resource('juicio',JuicioController::class);

//RUTAS AJAX
//BUSCAR CANTONES POR PROVINCIA
Route::get('/cantonesByProvincia',[ProvinciaController::class,'cantonesByProvincia'])->name('provincia.cantonesByProvincia');

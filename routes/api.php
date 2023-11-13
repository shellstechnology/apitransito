<?php
namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\transitoController;
use App\Http\Controllers\cambiarEstadoPaqueteController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/ruta', [transitoController::class, 'buscarLotesChofer'])->name('transito.buscarLotesChofer');
Route::post('/paquete',[cambiarEstadoPaqueteController::class, 'buscarPaquete'])->name('transito.cambiarEstadoPaquete')->middleware(Autenticacion::class);
Route::get('/ruta', [transitoController::class, 'obtenerCamiones'])->name('transito.obtenerCamiones');
Route::get('/chofer', [transitoController::class, 'obtenerChofer'])->name('transito.obtenerChofer')->middleware(Autenticacion::class);
Route::post('/ruta', [transitoController::class, 'buscarLotesChofer'])->name('transito.buscarLotesChofer')->middleware(Autenticacion::class);


Route::get('/paquetes/{d}',[cambiarEstadoPaqueteController::class, 'obtenerEstadosPaquete']);
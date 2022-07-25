<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\CronogramaController;
use App\Http\Controllers\EntidadeController;
use App\Http\Controllers\EntidadesContratanteController;
use App\Http\Controllers\OsceController;
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

Route::post('login', [AuthController::class, 'signin']);


Route::middleware('auth:sanctum')->group( function () {

    Route::post("/save/osce",[OsceController::class,'store']);
    Route::post("/save/entidad-contratante",[EntidadesContratanteController::class,'store']);
    Route::post("/save/entidad",[EntidadeController::class,'store']);
    Route::post("/save/cronograma",[CronogramaController::class,'store']);
    Route::post("/save/contrato",[ContratoController::class,'store']);

    /**for analytics */
    Route::get("/osce",[OsceController::class,"show"]);
    Route::get("/entidad-contratante",[EntidadesContratanteController::class,"show"]);
    Route::get("/entidad",[EntidadeController::class,"show"]);
    Route::get("/cronograma",[CronogramaController::class,"show"]);
    Route::get("/contrato",[ContratoController::class,"show"]);
});

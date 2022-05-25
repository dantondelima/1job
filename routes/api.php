<?php

use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\CandidatoController;
use App\Http\Controllers\Api\EmpresaController;
use App\Http\Controllers\Api\RecrutadorController;
use App\Http\Controllers\Api\VagaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/empresa', [EmpresaController::class, 'store']);
Route::post('/empresa/login', [EmpresaController::class, 'login']);
Route::get('/vagas/areas', [AreaController::class, 'index']); //por id

Route::group(['middleware' => 'empresa'], function () {
    //empresa
    Route::get('/empresa/{empresa}', [EmpresaController::class, 'show']); //por email
    Route::put('/empresa/{empresa}', [EmpresaController::class, 'update']); //por id
    Route::get('/empresa/vagas/{empresa}', [VagaController::class, 'index']); //por id

    //vagas
    Route::get('/vagas/{vaga}', [VagaController::class, 'show']); //por id
    Route::post('/vagas', [VagaController::class, 'store']);
    Route::put('/vagas/{vaga}', [VagaController::class, 'update']); //por id
    Route::delete('/vagas/{vaga}', [VagaController::class, 'destroy']); //por id

    //recrutadores
    Route::get('/empresa/recrutadores/{empresa}', [RecrutadorController::class, 'index']); //por id
    Route::get('/recrutadores/{recrutador}', [RecrutadorController::class, 'show']); //por id
    Route::post('/recrutadores', [RecrutadorController::class, 'store']);
    Route::put('/recrutadores/{recrutador}', [RecrutadorController::class, 'update']); //por id
    Route::delete('/recrutadores/{recrutador}', [RecrutadorController::class, 'destroy']); //por id
});

Route::post('/candidato', [CandidatoController::class, 'store']);
Route::post('/candidato/login', [CandidatoController::class, 'login']);
Route::group(['middleware' => 'candidato'], function () {
    Route::get('/candidato/{candidato}', [CandidatoController::class, 'show']); //por email
    Route::put('/candidato/{candidato}', [CandidatoController::class, 'update']); //por id
});

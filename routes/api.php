<?php

use App\Http\Controllers\Api\EmpresaController;
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
Route::group(['middleware' => 'empresa'], function () {
    Route::get('/empresa/{empresa}', [EmpresaController::class, 'show']);
});
// Route::resource('empresas', 'EmpresaController');

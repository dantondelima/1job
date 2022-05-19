<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

//Autenticação
Route::get('/', [AuthController::class, 'home'])->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'logar'])->name('logar');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/esqueceu-senha', function(){
    return view('admin.auth.email');
})->name('esqueci');
Route::post('/esqueceu-senha', [AuthController::class, 'esqueci'])->name('esqueci');
Route::get('/senha/reset/{token}', [AuthController::class, 'reset'])->name('resetar');
Route::post('/reset-password', [AuthController::class, 'resetar'])->name('resetar');

Route::resource('admins', 'AdminController');
Route::resource('empresas', 'EmpresaController');
Route::resource('candidatos', 'CandidatoController');
Route::resource('areas', 'AreaController');



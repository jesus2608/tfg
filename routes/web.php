<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\JuegosController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/juegos/panel', [JuegosController::class, 'juegos'])->name('auth.index');
Route::get('/juegos',[JuegosController:: class, 'index'])->name('juegos.index');
Route::get('/juegos/create', [JuegosController:: class, 'create'])->name('juegos.create');
Route::post('juegos/post', [JuegosController:: class, 'store'])->name('juegos.post');
Route::delete('/juegos/delete/{id}', [JuegosController::class, 'destroy'])->name('juegos.delete');
Route::get('/juegos/edit/{id}', [JuegosController::class, 'edit'])->name('juegos.put');
Route::put('/juegos/actualizar/{id}', [JuegosController::class, 'update'])->name('juegos.update');
Route::get('/juegos/show/{id}',[JuegosController:: class, 'show2'])->name('juegos.show2');
Route::get('/register', [RegisterController::class, 'create'])->name('register.create');  //Formulario de registro
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');  //Iniciar 
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');  //Cerrar sesión 
Route::get('/chat/{user}', [ChatController::class, 'index'])->name('chat.index')->middleware('auth');
Route::post('/chat/{user}', [ChatController::class, 'store'])->name('chat.store')->middleware('auth');
Route::get('/mis-conversaciones', [ChatController::class, 'conversaciones'])->name('chat.conversaciones')->middleware('auth');
Route::post('/pagar', [PagoController::class, 'pagar'])->name('pagar')->middleware('auth');
Route::get('/pagar', [PagoController::class, 'formulario'])->name('pago.form')->middleware('auth');
Route::middleware(['auth', 'IsAdmin'])->group(function () {
Route::get("/usuarios", [AdminUserController::class, 'index'])->name('usuarios.index')->middleware('auth');
Route::get('/usuarios/{user}/edit', [AdminUserController::class, 'edit'])->name('usuarios.edit')->middleware('auth');
Route::put('/usuarios/{user}', [AdminUserController::class, 'update'])->name('usuarios.update')->middleware('auth');
Route::delete('/usuarios/{user}', [AdminUserController::class, 'destroy'])->name('usuarios.destroy')->middleware('auth');
});
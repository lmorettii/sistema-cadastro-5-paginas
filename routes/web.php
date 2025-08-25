<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('auth.login');
});

// Auth flow (5 páginas)
Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.register'); // Pag 1
Route::post('/register', [AuthController::class, 'register'])->name('auth.register.post');

Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login'); // Pag 2
Route::post('/login', [AuthController::class, 'login'])->name('auth.login.post');

Route::get('/forgot', [AuthController::class, 'showForgot'])->name('auth.forgot'); // Botão esqueceu senha -> Pag 4 (edição)

Route::get('/edit', [AuthController::class, 'showEdit'])->name('auth.edit'); // Pag 4
Route::post('/edit', [AuthController::class, 'update'])->name('auth.edit.post');

Route::get('/logged', [AuthController::class, 'logged'])->name('auth.logged'); // Pag 5 (logado)
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

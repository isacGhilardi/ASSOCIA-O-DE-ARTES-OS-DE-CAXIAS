<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

// Rotas de Autenticação
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register.form');
Route::post('/register', [AuthController::class, 'store'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/login', [AuthController::class, 'index'])->name('login.form');
Route::get('/', fn () => redirect()->route('login.form'));

// Rotas Públicas
Route::get('/home', [PaginaController::class, 'home'])->name('home');
Route::get('/paginainicial', function () {
    return redirect()->route('home');
})->name('paginainicial');
Route::get('/sobre', [PaginaController::class, 'sobre'])->name('sobrenos');
Route::get('/contato', [PaginaController::class, 'contato'])->name('contato');

// Rota de teste das funcionalidades
Route::get('/teste', function() {
    return view('teste');
})->name('teste');

// Rota de auto login
Route::get('/auto-login', function() {
    return view('auto-login');
})->name('auto-login');

// Rotas Públicas de Visualização
Route::get('/eventos', [EventoController::class, 'index'])->name('evento');
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos');

// Rotas Administrativas - Produtos (Protegidas)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // ✅ Rotas específicas devem vir antes das com {id}
    Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
    Route::get('/produtos/{id}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
    Route::put('/produtos/{id}', [ProdutoController::class, 'update'])->name('produtos.update');
    Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');

    // ✅ Aqui também — “create” precisa vir antes de “{id}”
    Route::get('/eventos/create', [EventoController::class, 'create'])->name('eventos.create');
    Route::post('/eventos', [EventoController::class, 'store'])->name('eventos.store');
    Route::get('/eventos/{id}/edit', [EventoController::class, 'edit'])->name('eventos.edit');
    Route::put('/eventos/{id}', [EventoController::class, 'update'])->name('eventos.update');
    Route::delete('/eventos/{id}', [EventoController::class, 'destroy'])->name('eventos.destroy');
});

// ⚠️ Importante: rota de show deve ficar DEPOIS da “create”
Route::get('/eventos/{id}', [EventoController::class, 'show'])->name('eventos.show');

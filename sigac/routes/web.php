<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComprovanteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DeclaracaoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\EixoController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\TurmaController;

use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsAluno;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/chart', [TurmaController::class, 'chart']);

Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'aluno'])->group(function () {
    Route::get('/dashboard-aluno', [AlunoController::class, 'index']);
});

Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/dashboard-admin', [AdminController::class, 'index']);
    Route::resource('aluno', AlunoController::class);
    Route::resource('categoria', CategoriaController::class)->parameters(['categoria' => 'categoria']);
    Route::resource('comprovante', ComprovanteController::class);
    Route::resource('curso', CursoController::class);
    Route::resource('declaracao', DeclaracaoController::class);
    Route::resource('documento', DocumentoController::class);
    Route::resource('eixo', EixoController::class);
    Route::resource('nivel', NivelController::class);
    Route::resource('turma', TurmaController::class);
});

require __DIR__ . '/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComprovanteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DeclaracaoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\EixoController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\TurmaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('aluno', AlunoController::class);
Route::resource('categoria', CategoriaController::class)->parameters(['categoria' => 'categoria']);
Route::resource('comprovante', ComprovanteController::class);
Route::resource('curso', CursoController::class);
Route::resource('declaracao', DeclaracaoController::class);
Route::resource('documento', DocumentoController::class);
Route::resource('eixo', EixoController::class);
Route::resource('nivel', NivelController::class);
Route::resource('turma', TurmaController::class);

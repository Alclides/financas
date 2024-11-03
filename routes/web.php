<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TransacaoController;

// Redireciona para a página principal de transações ao acessar a raiz do projeto
Route::get('/', function () {
    return redirect()->route('transacoes.index');
});

// Rotas de CRUD para transações e categorias
Route::resource('transacoes', TransacaoController::class);
Route::resource('categorias', CategoriaController::class);

// Rota específica para o DataTables, retornando transações em JSON
Route::get('api/transacoes', [TransacaoController::class, 'getTransacoes'])->name('api.transacoes');

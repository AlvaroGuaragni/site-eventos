<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ServicoController;


Route::get('/', function () {
    return view('main');
});

Route::get('/home', function () {
    return view('main');
});

Route::get('/cliente/cadastrar', [ClienteController::class, 'Cadastrar']);
Route::post('/cliente/cadastrar', [ClienteController::class, 'salvar'])->name('cliente.salvar');
Route::post('/cliente/atualizar/{id}', [ClienteController::class, 'salvar'])->name('cliente.atualizar');
Route::get('/cliente/listar', [ClienteController::class, 'listar'])->name('cliente.listar');
Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');
Route::get('/cliente/editar/{id}', [ClienteController::class, 'editar']);
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
Route::post('/cliente/buscar', [ClienteController::class, 'buscar'])->name('cliente.buscar');



Route::get('/evento/editar/{id}', [EventoController::class, 'cadastrar'])->name('evento.editar');
Route::get('/evento/cadastrar', [EventoController::class, 'Cadastrar'])->name('evento.cadastrar');
Route::post('/evento/atualizar/{id}', [EventoController::class, 'salvar'])->name('evento.atualizar');
Route::get('/evento/listar', [EventoController::class, 'listar'])->name('evento.listar');
Route::put('/eventos/{id}', [EventoController::class, 'update'])->name('eventos.update');
Route::delete('/eventos/{id}', [EventoController::class, 'destroy'])->name('evento.destroy');
Route::post('/evento/salvar/{id?}', [EventoController::class, 'salvar'])->name('evento.salvar');
Route::post('/evento/buscar', [EventoController::class, 'buscar'])->name('evento.buscar');




Route::get('/local/cadastrar', [LocalController::class, 'Cadastrar'])->name('local.cadastrar');
Route::post('/local/atualizar/{id}', [LocalController::class, 'salvar'])->name('local.atualizar');
Route::get('/local/listar', [LocalController::class, 'listar'])->name('local.listar');
Route::get('/local/editar/{id}', [LocalController::class, 'local.editar']);
Route::put('/locais/{id}', [LocalController::class, 'update'])->name('locais.update');
Route::get('/local/editar/{id}', [LocalController::class, 'editar']);
Route::delete('/locais/{id}', [LocalController::class, 'destroy'])->name('local.destroy');
Route::post('/local/salvar/{id?}', [LocalController::class, 'salvar'])->name('local.salvar');
Route::post('/local/buscar', [LocalController::class, 'buscar'])->name('local.buscar');

// Fornecedor - rotas resource
Route::resource('fornecedores', FornecedorController::class);
Route::post('/fornecedores/buscar', [FornecedorController::class, 'buscar'])->name('fornecedores.buscar');

// Serviço - rotas resource
Route::resource('servicos', ServicoController::class);
Route::post('/servicos/buscar', [ServicoController::class, 'buscar'])->name('servicos.buscar');

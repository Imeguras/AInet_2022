<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmesController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\LugarController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', [FilmesController::class, 'index'])->name('filmes');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/filme/{id}/sessoes', [FilmesController::class, 'sessoes'])->name('sessoes');
Route::get('/escolher-lugar/{id}', [LugarController::class, 'escolher'])->name('escolher_lugar');
Route::get('/carrinho-de-compras', [CarrinhoController::class, 'index'])->name('carrinho_compras');
Route::get('/limpar-carrinho', [CarrinhoController::class, 'limpar'])->name('limpar_carrinho');
Route::get('/remover-bilhete/{key}', [CarrinhoController::class, 'remover'])->name('remover_bilhete');


Route::post('/adicionar-ao-carrinho', [CarrinhoController::class, 'adicionar'])->name('adicionar');
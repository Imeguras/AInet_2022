<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmesController;
use App\Http\Controllers\CarrinhoController;


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
Route::get('/carrinho-de-compras', [CarrinhoController::class, 'index'])->name('carrinho_compras');
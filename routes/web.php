<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmesController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\LugarController;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\BilhetesController; 


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

Auth::routes(['verify'=>true]);

Route::get('/', [FilmesController::class, 'index'])->name('filmes');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/filme/{id}/sessoes', [FilmesController::class, 'sessoes'])->name('sessoes');
//Alteração dos perfis de utilizador
Route::get('/alterprofile',  [UserController::class, 'index'])->name('alterprofile');
Route::post('/alterprofile', [UserController::class, 'alterProfile'])->name('alterprofilesubmit');
Route::post('/alteruser', [UserController::class, 'alterUser'])->name('alterUsersubmit');
//Validação dos bilhetes 
Route::get('/ticketvalidate', [BilhetesController::class, 'index'])->name('ticketAccessControl');
Route::get('/ticketvalidate/{id}/check', [BilhetesController::class, 'validateBilhete'])->name('validateTicket');
Route::post('/ticketvalidate/use', [BilhetesController::class, 'useBilhete'])->name('useBilhete');

Route::get('/escolher-lugar/{id}', [LugarController::class, 'escolher'])->name('escolher_lugar');
Route::get('/carrinho-de-compras', [CarrinhoController::class, 'index'])->name('carrinho_compras');
Route::get('/limpar-carrinho', [CarrinhoController::class, 'limpar'])->name('limpar_carrinho');
Route::get('/remover-bilhete/{key}', [CarrinhoController::class, 'remover'])->name('remover_bilhete');


Route::post('/adicionar-ao-carrinho', [CarrinhoController::class, 'adicionar'])->name('adicionar');
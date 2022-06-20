<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmesController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\LugarController;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\BilhetesController; 
use App\Http\Controllers\Auth\RegisterController; 
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BilhetesController;
use App\Http\Controllers\SessoesController;
use App\Http\Controllers\RecibosController;
use App\Http\Controllers\SalasController;

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
Route::get('/recibos', [RecibosController::class, 'index'])->name('recibos');
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
Route::get('/pagar', [CarrinhoController::class, 'pagar'])->name('pagar');
Route::get('/recibo/{id}',[RecibosController::class, 'detalhes'])->name('consultar');
Route::get('/bilhetes', [BilhetesController::class, 'listagem'])->name('bilhetes');
Route::get('/admin/salas', [SalasController::class, 'admin_index'])->name('admin_salas');
Route::get('/admin/salas/create', [SalasController::class, 'admin_create'])->name('admin_salas_create');
Route::get('/admin/salas/{id}/edit', [SalasController::class, 'admin_edit'])->name('admin_salas_edit');


Route::post('/alterprofile', [UserController::class, 'alterProfile'])->name('alterprofilesubmit');
Route::post('/alteruser', [UserController::class, 'alterUser'])->name('alterUsersubmit');
Route::post('/adicionar-ao-carrinho', [CarrinhoController::class, 'adicionar'])->name('adicionar');
Route::post('/paymentVISA',[PaymentController::class, 'paymentVISA'])->name('pay_with_VISA');
Route::post('/paymentPayPal',[PaymentController::class, 'paymentPayPal'])->name('pay_with_PayPal');
Route::post('/paymentMBWAY',[PaymentController::class, 'paymentMBWAY'])->name('pay_with_MBWAY');
Route::post('/admin/salas/save', [SalasController::class, 'admin_save'])->name('admin_salas_save');
Route::post('/admin/salas/delete', [SalasController::class, 'admin_delete'])->name('admin_salas_delete');

//Route::middleware('auth', 'can:cru')->group(function () {
	Route::get('/crudFilmes', [FilmesController::class, 'crudIndex'])->name('filmes_crud');
	Route::get('/crudFilmes/create', [FilmesController::class, 'createView'])->name('filmes_create');
	Route::get('/crudFilmes/{id}/edit', [FilmesController::class, 'editView'])->name('filmes_edit');
	Route::post('/crudFilmes/create', [FilmesController::class, 'create'])->name('filmes_store');
	Route::post('/crudFilmes/{id}/edit', [FilmesController::class, 'edit'])->name('filmes_update');
//});
Route::get('/crudSessoes/{id}/create', [SessoesController::class, 'index'])->name('filmes_addSessoes');
Route::post('/crudSessoes/create', [SessoesController::class, 'create'])->name('sessoes_create');
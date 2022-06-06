<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;
use App\Http\Controllers\FilmesController;
class UserController extends Controller{
	public function alterProfile(Request $request){
		$user = $request->user();
		if($user->tipo=="C"){
			$cliente = Cliente::where('id', $user->id)->first();
			$cliente->nif = $request->nif;
			$cliente->tipo_pagamento = $request->tipo_pagamento;
			$cliente->ref_pagamento = $request->ref_pagamento;
			$cliente->update();

		}
		$user->name = $request->name;
		$user->save();

		//return FilmesController::index();
		return redirect()->route('filmes');
	}
	public function index(Request $request){
		if($request->user()->tipo=="C"){
			return view('user.alterprofile')->with('user',$request->user()->join('clientes','clientes.id','=','users.id')->where('clientes.id','=',$request->user()->id)->first());
		}else {
			return view('user.alterprofile')->with('user', $request->user());
		}
		
	} 
}

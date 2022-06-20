<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;
use App\Http\Controllers\FilmesController;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller{
	public function alterProfile(Request $request){
		$user = $request->user();
		
		if($user->tipo=="A"){
			$user=Users::where('id',$request->id)->first();
			
		}

		if($user->tipo=="C"){
			$cliente = Cliente::where('id', $user->id)->first();
			$cliente->nif = $request->nif;
			$cliente->tipo_pagamento = $request->tipo_pagamento;
			$cliente->ref_pagamento = $request->ref_pagamento;
			$cliente->update();
	
		}
		$user->name = $request->name;
		$password = $request->password;
		if($password!=null){
			$user->password = Hash::make($password);
		}
		$user->save();

		//return FilmesController::index();
		return redirect()->route('filmes');
	}
	public function index(Request $request){
		if($request->user()->tipo=="C"){
			return view('user.alterprofile')->with('user',$request->user()->join('clientes','clientes.id','=','users.id')->where('clientes.id','=',$request->user()->id)->first());
		//if request tipo is A open view user.alterprofile with user as the $request->user and users as user name and id
		}else if ($request->user()->tipo=="A") {
			
			return view('user.alterprofile')->with('user', $request->user())->with('users',Users::all(['id','name']));
		}else {
			return view('user.alterprofile')->with('user', $request->user());
		}
		
	}
	//add to the current page view user alterprofile with user as the id submited in post
	public function alterUser(Request $request){
		//return view ('user.alterprofile') with the user from the request, all users , and the user whose id is equal to userId
		$selUser = Users::whereId($request->userId)->first(); 
		if ($selUser->tipo=="C") {
			$selUser=$selUser->join('clientes','clientes.id','=','users.id')->where('clientes.id','=',$request->userId)->first();
		}

		return view('user.alteruser')->with('user', $request->user())->with('users',Users::all(['id','name']))->with('userId', $selUser);
	}
}

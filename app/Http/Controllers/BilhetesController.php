<?php

namespace App\Http\Controllers;

use App\Models\Bilhete;
use Illuminate\Database\Eloquent\Builder;


use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\Sessao;
use App\Models\Genero;

class BilhetesController extends Controller{

   //optional search parameter that filters the data

   public function index(Request $request){
		$request->flash();
		
			$sessoes = Sessao::join('filmes', 'sessoes.filme_id', '=', 'filmes.id')->get();
	
		return view('bilhetes.index')->with('sessoes',$sessoes);

   }
   public function validateBilhete(Request $request, $id){
		$request->flash();
		$bilhete = Bilhete::where('sessao_id', $id)->get();
		return view('bilhetes.sessao')->with('bilhetes',$bilhete);
	}
   

}

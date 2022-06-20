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
		
			$sessoes = Sessao::join('filmes', 'sessoes.filme_id', '=', 'filmes.id')->select('sessoes.id', 'filmes.titulo','sessoes.data', 'sessoes.horario_inicio','sessoes.sala_id','filmes.genero_code')->orderBy('sessoes.data', 'asc')->get();
	
		return view('bilhetes.index')->with('sessoes',$sessoes);

   }
   public function validateBilhete(Request $request, $id){
		$request->flash();
		$bilhete = Bilhete::where('sessao_id', $id)->get();
		return view('bilhetes.sessao')->with('bilhetes',$bilhete);
	}
	public function useBilhete(Request $request){
		$bilhete = Bilhete::find($request->id);
		$bilhete->estado = "usado";
		$bilhete->save();
		//return to where the user came from
		return redirect()->back();
	}
   

}

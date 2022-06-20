<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;


use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\Sala;
use App\Models\Sessao;
use App\Models\Genero;
use Illuminate\Http\UploadedFile;
class SessoesController extends Controller{
	public function index(Request $request, $id){
		// return view with filme that has id $id
		$filme = Filme::where('id', $id)->first();
		return view('sessoes.index')->with('filme',$filme)->with('salas', Sala::all());
	}
	public function create(Request $request){
		$datas = $request->input('data');
		$times = $request->input('horario_inicio');
		//separate times in $times where delimiter is ; and then parse time 
		$times = explode(';', $times);
		$times = array_map(function($time){
			return date('H:i', strtotime($time));
		}, $times);
		
		//Foreach data in datas and time in times, create a sessao
		foreach($datas as $key => $data){
			foreach($times as $key => $time){
				$sessao = new Sessao();
				$sessao->filme_id = $request->input('filme_id');
				$sessao->sala_id = $request->input('sala_id');
				$sessao->data = $data;
				$sessao->horario_inicio = $times[$key];
				$sessao->save();
			}
		}
				
	}
}
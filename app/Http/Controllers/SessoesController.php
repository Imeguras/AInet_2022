<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;


use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\Sala;
use App\Models\Genero;
use Illuminate\Http\UploadedFile;
class SessoesController extends Controller{
	public function index(Request $request, $id){
		// return view with filme that has id $id
		$filme = Filme::where('id', $id)->first();
		return view('sessoes.index')->with('filme',$filme)->with('salas', Sala::all());
	}
}
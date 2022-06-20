<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;


use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\Sessao;
use App\Models\Genero;

class FilmesController extends Controller{
   public function index(Request $request)
   {
        $request->flash();
        $qry = Filme::query();

        if ($request->input('titulo') !== null){
            $titulo = '%'.$request->input('titulo').'%';
             $qry->where('titulo', 'like', $titulo);
        }

        if ($request->input('sumario') !== null){
            $sumario = '%'.$request->input('sumario').'%';
            $qry->where('sumario', 'like', $sumario);
        }

        if ($request->input('genero') != ""){
            $qry->where('genero_code', $request->input('genero'));
        }

        $filmes = $qry->whereHas('sessoes', function(Builder $query) {
            $query->where('data', '>', date("Y-m-d"));
        })->paginate(10);


        //dd($filmes);
       
        $generos = Genero::all();

        //dd($generos);
        
        return view('filmes.index')
              ->withFilmes($filmes)
              ->withGeneros($generos);
   }

   public function sessoes($id)
   { 
       $filme = Filme::where('id', $id)->first();
       //dd($filme);
       
       //Deveria passar só as sessões que têm lugares disponiveis...
       //para isso, ver quantos bilhetes já existem para determinada sessão e comparar com o número de lugares na sala em que a sessão ocurrerá
       //
       //SQL: $numLugares = select count(*) from lugares where sala_id = $sessao->sala_id
       //SQL: $numBilhetes = select count(*) from bilhetes where sessao_id = $sessao->id
       //só é selecionada a sessão se $numLugares > $numBilhetes
       //
       
       /*$sessoes = Sessao::where([
                    ['filme_id', $filme->id],
                    ['data', '>=', date("Y-m-d")]
                ])->get();*/

        //hora à 5 min
        $time = date("H:i" , mktime(date("H"), date("i")-5));
        $today = date("Y-m-d");
        //dd($time);

        $sessoes = Sessao::where('horario_inicio','>=',$time)->orWhere('data','>', $today)->withCount('lugares')->withCount('bilhetes')->where('filme_id', $filme->id)->where('data', '>=', date("Y-m-d"))->havingRaw('bilhetes_count < lugares_count')->get();

       //dd($sessoes);
       
       return view('filmes.sessoes')
              ->withFilme($filme)
              ->withSessoes($sessoes);
   }
   public function crudIndex(){
	   $filmes = Filme::all();
		return view('filmes.crud_view')
			  ->withFilmes($filmes);
   }
   
   public function createView(){
		//return view filmes.crud_operation
		return view('filmes.crud_operation');
	}
   public function editView(Request $request, $id){
	   	$filme= Filme::where('id', $id)->first();
		return  view('filmes.crud_operation')->with('filme', $filme);
   }
   public function create(Request $request){
	   //create the new filme with $request parameters
	   $filme = new Filme();
	   $filme->titulo = $request->input('titulo');
	   $filme->sumario = $request->input('sumario');
	   $filme->genero_code = $request->input('genero');
	   $filme->save();
	   return redirect()->back();

   }
   public function update(Request $request, $id){
	   //update the filme with $request parameters
	   $filme = Filme::where('id', $id)->first();
	   $filme->titulo = $request->input('titulo');
	   $filme->sumario = $request->input('sumario');
	   $filme->genero_code = $request->input('genero');
	   $filme->save();
	   return redirect()->back();
   }
}

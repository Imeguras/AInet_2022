<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;


use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\Sessao;

class FilmesController extends Controller
{
    /* $qry = Disciplina::query();
        if ($curso) {
            $qry->where('curso', $curso);
        }
        $disciplinas = $qry->paginate(10);
        $cursos = Curso::pluck('nome', 'abreviatura');
        return view('disciplinas.admin')
            ->withDisciplinas($disciplinas)
            ->withCursos($cursos)
            ->withSelectedCurso($curso);
    */
   
   public function index()
   {
       $filmes = Filme::whereHas('sessoes', function(Builder $query) {
            $query->where('data', '>', date("Y-m-d"));
       })->paginate(10);

       //dd($filmes);
        
       return view('filmes.index')
              ->withFilmes($filmes);
   }

   public function comprar($id)
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
       $sessoes = Sessao::where([
                    ['filme_id', $filme->id],
                    ['data', '>=', date("Y-m-d")]
                ])->get();

       //dd($sessoes);
       

       return view('filmes.comprar')
              ->withFilme($filme)
              ->withSessoes($sessoes);
   }

}

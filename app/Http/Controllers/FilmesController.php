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
        
       return view('filmes.index')->withFilmes($filmes);
   }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;

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
       //$filmes = Filme::all();
       $filmes = Filme::select('id','trailer_url','titulo','sumario','genero_code')->paginate(10);
       //$filmes = $qry;//->paginate(10);
       //dd($filmes);
       return view('filmes.index')->withFilmes($filmes);
   }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sessao;
use App\Models\Lugar;
use App\Models\Bilhete;

class LugarController extends Controller
{
    public function escolher($id)
    {
        $sessao = Sessao::where('id',$id)->first();
        
        $filas = Lugar::select('fila')->where('sala_id', $sessao->sala_id)->distinct()->pluck('fila');
        //dd($filas);


        foreach ($filas as $fila) {
            $lugares[$fila] = Lugar::where('sala_id', $sessao->sala_id)->where('fila', $fila)->get();    
        }
        $lugares_ocupados = Bilhete::where('sessao_id', $sessao->id)->pluck('lugar_id');

        //dd($lugares_ocupados);
        //dd($lugares);

        $lugares_sessao = array();
        if (session('bilhetes')) {
            foreach (session('bilhetes') as $sessaoBilhetes) {
                if ($sessaoBilhetes['sessao']->id == $sessao->id) {
                    array_push($lugares_sessao, $sessaoBilhetes['lugar']->id);
                }
            }
        }

        return view('lugar.escolher')
                ->withLugares($lugares)
                ->withSessao($sessao)
                ->withLugaresOcupados($lugares_ocupados)
                ->withSessaoLugares($lugares_sessao);
    }
}

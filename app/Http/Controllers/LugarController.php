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
        $lugares_ocupados = Bilhete::where('sessao_id', $sessao->sala_id)->pluck('lugar_id');

        //dd($lugares_ocupados);
        //dd($lugares);

        return view('lugar.escolher')
                ->withLugares($lugares)
                ->withSessao($sessao)
                ->withLugaresOcupados($lugares_ocupados);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recibo;
use Illuminate\Support\Facades\Auth;
use App\Models\Bilhete;


class RecibosController extends Controller
{
    public function index()
    {
        $recibos = Recibo::where('cliente_id', Auth::user()->id)->orderBy('data', 'desc')->paginate(10);

        return view('recibos.index')
                ->withRecibos($recibos);
    }

    public function detalhes($id)
    {
        $recibo = Recibo::where('id', $id)->first();
        //dd($recibo);
        
        $bilhetes = Bilhete::where('recibo_id', $recibo->id)->get();
        //dd($bilhetes);
        return view('recibos.consultar')
                ->withRecibo($recibo)
                ->withBilhetes($bilhetes);
    }
}

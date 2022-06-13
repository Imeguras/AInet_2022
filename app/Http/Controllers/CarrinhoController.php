<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function index(){
        return view('carrinho.index')
                ->withBilhetes(session('bilhetes'));
    }

    public function adicionar($idSessao, $idLugar)
    {
        //criar bilhete
        //criar parcialmente o bilhete.
        $bilhete = ['sessao_id' => $idSessao,
                    'lugar_id' => $idLugar,
                    ];
        //adicionar ao carrinho
        $bilhetes = session('bilhetes');
        
        if (!$bilhetes) {
            $bilhetes =  array();
        }

        session()->put($bilhete, $bilhetes);

        return redirect()->back()->with('success', 'Bilhete adicionado ao carrinho.');
    }
}

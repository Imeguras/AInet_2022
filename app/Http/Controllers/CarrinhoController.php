<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function index(){
        return view('carrinho.index')
                ->withBilhetes(session('bilhetes'));
    }

/*
    public function teste(Request $request){
        //dd($request->input('lugares'));
        return view('teste');
    }
*/

    public function adicionar(Request $request)
    {
        $lugaresID = $request->input('lugares');
        $sessaoID = $request->input('sessaoID');

        $adicionados = 0;
        //dd($lugaresID);
        foreach ($lugaresID as $id) {

            if (in_array($id, session('bilhetes'))) {
                continue;
            }

            $bilhete = ['sessao_id' => $sessaoID,
                        'lugar_id' => $id
                        ]; 

            $adicionados++;
            session()->push('bilhetes', $bilhete);
        }

        if ($adicionados == 0) {
            session()->flash('error', 'Não há bilhetes novos a adicionar.');    
        }elseif ($adicionados == 1) {
            session()->flash('success', 'Bilhete adicionado ao carrinho de compras com sucesso.');
        }else{
            session()->flash('success', 'Bilhetes adicionados ao carrinho de compras com sucesso.');
        }
        
        return redirect()->route('filmes');
    }
}

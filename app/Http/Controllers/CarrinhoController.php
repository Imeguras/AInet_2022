<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuracao;
use App\Models\Sessao;
use App\Models\Lugar;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;

class CarrinhoController extends Controller
{
    public function index(Request $request){

        //dd(session('bilhetes'));

        $configs = Configuracao::all()[0];

        //dd($configs);

        $preco = (double) $configs->preco_bilhete_sem_iva;
        $iva = $configs->percentagem_iva;
        //dd($preco, $iva);

        $precoTotalSemIva = 0;
        if(session('bilhetes') !== null) {
            $precoTotalSemIva = $preco * count(session('bilhetes'));
        }

        $totalIva = $iva/100 * $precoTotalSemIva;
        $total = $precoTotalSemIva + $totalIva;
        $bilheteIva = $iva/100 * $preco;
        $totalBilheteComIva = $preco + $bilheteIva;

        $preco = number_format($preco, 2, ',', ' ');
        $iva = number_format($iva, 2, ',', ' ');
        $totalBilheteComIva = number_format($totalBilheteComIva, 2, ',', ' ');
        $precoTotalSemIva = number_format($precoTotalSemIva, 2, ',', ' ');
        $totalIva = number_format($totalIva, 2, ',', ' ');
        $total = number_format($total, 2, ',', ' ');
        $bilheteIva = number_format($bilheteIva, 2, ',', ' ');

        
        $precos = ['Preço por Bilhete'                 => $preco . " €",
                   'Percentagem Iva'                   => $iva . " %",
                   'Iva por bilhete'                   => $bilheteIva . " €",
                   'Preço total de um bilhete com Iva' => $totalBilheteComIva . " €"
                   ];

        if ($precoTotalSemIva != "0,00") {
                        
           $precos[' '] =  "";
           $precos['Total Sem Iva'] =  $precoTotalSemIva . " €";
           $precos['Total pago em Iva'] =  $totalIva . " €";
           $precos['Total'] =  $total . " €";
        }            
                

        //dd($precos);

        return view('carrinho.index')
                ->withBilhetes(session('bilhetes'))
                ->withPrecos($precos);
    }

    public function adicionar(Request $request)
    {
        $lugaresID = $request->input('lugares');
        $sessaoID = $request->input('sessaoID');

        $adicionados = 0;
        //dd($lugaresID);
        
        if ($lugaresID === null) {
            return redirect()->route('filmes');
        }

        foreach ($lugaresID as $id) {
            $existe = false;

            if (session('bilhetes') !== null){
                foreach(session('bilhetes') as $bilhete)
                    if($sessaoID == $bilhete['sessao']->id
                        && $id == $bilhete['lugar']->id) {
                            $existe = true;
                }
            }

            if ($existe) {
                continue;
            }

            $bilhete = ['sessao' => Sessao::where('id', $sessaoID)->first(),
                        'lugar' => Lugar::where('id', $id)->first()
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

    public function limpar(){
        session()->forget('bilhetes');
        session()->flash('success', 'Carrinho limpo com sucesso.');
        return redirect()->back();
    }

    public function remover($key){
        //dd($key, session('bilhetes')[$key]);
        $bilhetes = session('bilhetes');
        session()->forget('bilhetes');
        unset($bilhetes[$key]);

        foreach ($bilhetes as $bilhete) {
            session()->push('bilhetes', $bilhete);
        }

        session()->flash('success', 'Bilhete removido com sucesso.');
        return redirect()->back();
    }

    public function pagar(){
        $cliente = Cliente::where('id', Auth::user()->id)->get()[0];
        return view('carrinho.pagar')
            ->withCliente($cliente);
    }
}

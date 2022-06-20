<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Payment;
use App\Models\Configuracao;
use App\Models\Recibo;
use App\Models\Bilhete;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function paymentVISA(Request $request)
    {
        if (Payment::payWithVisa($request->input('ccNumber'), $request->input('svcCode'))) {
            if ($request->has('nif')) {
                $this->success("VISA", $request->input('nif'), $request->input('ccNumber'));
            }else{
                $this->success("VISA", null, $request->input('ccNumber'));
            }

            session()->forget('bilhetes');
            session()->flash('success', 'Bilhetes pagos com sucesso');
            return view('filmes');
        }

        session()->flash('error', 'Cartão não aceite. Verifique os valores introduzidos');
        return redirect()->back();
    }

    public function paymentMBWAY(Request $request)
    {
        if (Payment::payWithMBway($request->input('phoneNumber'))) {
            
            if ($request->has('nif')) {
                $this->success("MBWAY", $request->input('nif'), $request->input('phoneNumber'));
            }else{
                $this->success("MBWAY", null, $request->input('phoneNumber'));
            }

            session()->forget('bilhetes');
            session()->flash('success', 'Bilhetes pagos com sucesso');
            return view('filmes.index');
        }

        session()->flash('error', 'Número de telemóvel inválido. Verifique os valores introduzidos');
        return redirect()->back();
    }

    public function paymentPayPal(Request $request)
    {
        if (Payment::payWithPaypal($request->input('email'))) {
            if ($request->has('nif')) {
                $this->success("PAYPAL", $request->input('nif'), $request->input('email'));
            }
            else{
                $this->success("PAYPAL", null, $request->input('email'));
            }

            session()->forget('bilhetes');
            session()->flash('success', 'Bilhetes pagos com sucesso');
            return view('filmes.index');
        }

        session()->flash('error', 'Email inválido. Verifique os valores introduzidos');
        return redirect()->back();
    }

    public function success($tipoPagamento, $nif, $ref_pagamento)
    {
        $precos = $this->getPrecos();

        $recibo = Recibo::create([
            'cliente_id' => Auth::user()->id,
            'data' => date("Y-m-d"),
            'preco_total_sem_iva' => $precos['no_iva'],
            'iva' => $precos['just_iva'],
            'preco_total_com_iva' => $precos['total'],
            'nif' => $nif,
            'nome_cliente' => Auth::user()->name,
            'tipo_pagamento' => $tipoPagamento,
            'ref_pagamento' => $ref_pagamento,
            'recibo_pdf_url' => null
        ]);

        foreach (session('bilhetes') as $bilhete) {
            Bilhete::create([
                    'recibo_id' => $recibo->id,
                    'cliente_id'=> Auth::user()->id,
                    'sessao_id'=> $bilhete['sessao']->id,
                    'lugar_id' => $bilhete['lugar']->id,
                    'preco_sem_iva' => $precos['bilhete'],
                    'estado' => 'não usado'
                ]);
        }        


        session()->forget('bilhetes');
        session()->flash('success', 'Bilhetes pagos com sucesso');
        return view('filmes.index');

    }

    public function getPrecos()
    {
        $configs = Configuracao::all()[0];

        $preco = (double) $configs->preco_bilhete_sem_iva;
        $iva = $configs->percentagem_iva;

        $precoTotalSemIva = $preco * count(session('bilhetes'));
        $totalIva = $iva/100 * $precoTotalSemIva;
        $total = $precoTotalSemIva + $totalIva;

        $preco = number_format($preco, 2, '.', ' ');
        $precoTotalSemIva = number_format($precoTotalSemIva, 2, '.', ' ');
        $totalIva = number_format($totalIva, 2, '.', ' ');
        $total = number_format($total, 2, '.', ' ');
        
        $precos = ['bilhete'  => $preco,
                   'no_iva'   => $precoTotalSemIva,
                   'just_iva' => $totalIva,
                   'total'    => $total
                   ];

        return $precos;
    }
}

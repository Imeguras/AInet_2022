@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	<h3>Detalhes Recibo</h3>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>
                                    Data: {{$recibo->data}}
                                </td>
                                <td>
                                    NIF: {{$recibo->nif}}
                                </td>
                                <td>
                                    Pagamento efetuado com: {{$recibo->tipo_pagamento}}
                                </td>
                                <td>
                                    @switch($recibo->tipo_pagamento)
                                        @case("MBWAY")
                                            Número telemóvel: {{$recibo->ref_pagamento}}
                                            @break

                                        @case("PayPal")
                                            Email: {{$recibo->ref_pagamento}}
                                            @break

                                        @case("VISA")
                                            Número Cartão: {{$recibo->ref_pagamento}}
                                            @break

                                    @endswitch
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Total sem Iva: {{$recibo->preco_total_sem_iva}}
                                </td>
                                <td>
                                    Total Iva: {{$recibo->iva}}
                                </td>
                                <td>
                                    Total com Iva: {{$recibo->preco_total_com_iva}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p>Bilhetes associados ao Recibo:</p>
                    @foreach($bilhetes as $bilhete)
                        <div class="card">
                            <div class="row no-gutters">
                                @isset($bilhete->sessao->filme->cartaz_url)
                                    <div class="col-auto">
                                        <img src="{{ asset('storage/cartazes/' . $bilhete->sessao->filme->cartaz_url) }}" class="img-fluid" alt="Cartaz filme" style="height: 200px;">
                                    </div>
                                @endisset
                                <div class="col">
                                    <div class="card-block px-2">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        Filme: {{$bilhete->sessao->filme->titulo}}
                                                    </td>
                                                    <td>
                                                        Sala: {{$bilhete->lugar->sala->nome}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Data: {{$bilhete->sessao->data}}
                                                    </td>
                                                    <td>
                                                        Fila: {{$bilhete->lugar->fila}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Hora de inicio: {{$bilhete->sessao->horario_inicio}}
                                                    </td>
                                                    <td>
                                                        Posição: {{$bilhete->lugar->posicao}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
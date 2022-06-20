@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	<h3>Recibos</h3>
                </div>
                <div class="card-body">
                    @foreach($recibos as $recibo)
                        <div class="card">
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
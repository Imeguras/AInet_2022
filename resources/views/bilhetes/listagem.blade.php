@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	<h3>Bilhetes</h3>
                </div>
                <div class="card-body">
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
                                                <tr>
                                                    <td>
                                                        Estado: {{$bilhete->estado}}
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
                {{$bilhetes->withQueryString()->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
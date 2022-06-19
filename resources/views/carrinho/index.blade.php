@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	<h3>Carrinho de Compras</h3>
                </div>
                <div class="card-body">
                	@if ($message = Session::get('success'))
	                	<div class="alert alert-success" role="alert">
							<h4 class="alert-heading">Sucesso !</h4>
						    <p>{{$message}}</p>
						</div>
					@elseif($message = Session::get('error'))
	                	<div class="alert alert-danger" role="alert">
							<h4 class="alert-heading">Erro !</h4>
						    <p>{{$message}}</p>
						</div>
					@endif
                	@if($bilhetes == null)
                		<h4 class="text-center">Não há bilhetes no carrinho</h4>
                	@else
	                	@foreach($bilhetes as $key => $bilhete)
	                		<div class="card">
							    <div class="row no-gutters">
			                		@isset($bilhete['sessao']->filme->cartaz_url)
							            <div class="col-auto">
							                <img src="{{ asset('storage/cartazes/' . $bilhete['sessao']->filme->cartaz_url) }}" class="img-fluid" alt="Cartaz filme" style="height: 200px;">
							            </div>
							        @endisset
						            <div class="col">
						                <div class="card-block px-2">
						                	<table class="table table-borderless">
						                		<tbody>
						                			<tr>
						                				<td>
						                					Filme: {{$bilhete['sessao']->filme->titulo}}
														</td>
														<td>
														    Sala: {{$bilhete['lugar']->sala->nome}}
														</td>
													</tr>
													<tr>
													    <td>
													        Data: {{$bilhete['sessao']->data}}
														</td>
														<td>
															Fila: {{$bilhete['lugar']->fila}}
														</td>
													</tr>
													<tr>
														<td>
															Hora de inicio: {{$bilhete['sessao']->horario_inicio}}
						                				</td>
						                				<td>
						                					Posição: {{$bilhete['lugar']->posicao}}
						                				</td>
						                			</tr>
						                		</tbody>
						                	</table>
						                	<div class="text-end">
						                		<a href=" {{ route('remover_bilhete', ['key' => $key]) }} " class="btn btn-danger">Remover bilhete</a>
						                	</div>
						                </div>
						            </div>
						    	</div>
		                	</div>
		                	<br>
	                	@endforeach
	                @endif
				</div>
				<div class="card-body">
					<h4 class="text-center"> Tabela de Preços </h4>
					<table class="table table-borderless table-hover">
			            <caption>Tabela de preços</caption>
						<tbody>
							@foreach($precos as $key => $value)
							    <tr>
							    	<td>{{$key}}</td>
							    	<td class="text-end">{{$value}}</td>
							    </tr>
						    @endforeach
						</tbody>
					</table>
				</div>
				<div class="card-body text-end">
					<a href=" {{ route('limpar_carrinho') }}" class="btn btn-danger">Limpar Carrinho</a>
					@if (Auth::user() && $bilhetes != null)
						<a href="#" class="btn btn-primary">Pagar</a>	
					@else
						<a href="#" class="btn btn-primary disabled" aria-disabled="true">Pagar</a>
					@endif
				</div>
        	</div>
    	</div>
	</div>
</div>
@endsection
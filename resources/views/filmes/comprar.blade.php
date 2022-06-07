@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	<h3>{{$filme->titulo}}</h3>
                </div>
                <div class="card-body">
                	<div class="card">
					    <div class="row no-gutters">
	                		@isset($filme->cartaz_url)
					            <div class="col-auto">
					                <img src="{{ asset('storage/cartazes/' . $filme->cartaz_url) }}" class="img-fluid" alt="Cartaz filme" style="width: 300px;">
					            </div>
					        @endisset
				            <div class="col">
				                <div class="card-block px-2">
				                    <h5 class="card-title">Género: {{$filme->genero_code}}</h5>
				                    <p class="card-text">Ano: {{$filme->ano}} </p>
				                    <p class="card-text">{{$filme->sumario}}</p>
				                </div>
				            </div>
				    	</div>
                	</div>
	            	<br>
		            <table class="table table-borderless table-hover">
					  <thead>
					    <tr>
					      <th scope="col">Sala</th>
					      <th scope="col">Data</th>
					      <th scope="col">Horário Inicio</th>
					      <th scope="col">Lugares Disponiveis </th>
					      <th scope="col"></th>
					    </tr>
					  </thead>
					  <tbody>
					    @foreach($sessoes as $key => $sessao)
						    <tr>
						    	<td>{{$sessao->sala_id}}</td>
						    	<td>{{$sessao->data}}</td>
						    	<td>{{$sessao->horario_inicio}}</td>
						    	<td>Placeholder: {{$key}}</td>
						    	@if(Auth::user() !== null /*Se houver utilizador autenticado*/) 
						    		<td><a href= "#" class="btn btn-primary justify-content-right">Comprar Bilhete</a></td>
						    	@endif
						    </tr>
					    @endforeach
					  </tbody>
					</table>
				</div>
        	</div>
    	</div>
	</div>
</div>
@endsection
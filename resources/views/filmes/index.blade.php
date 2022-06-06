@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Filmes</div>
	                <div class="card-body">
	                	<div class="card-deck" >
		                	@foreach($filmes as $filme)
		                		<div id= "CardMovie{{$filme->id}}" class="card">
								  <iframe  src="https://www.youtube.com/embed/{{ substr($filme->trailer_url, 32) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="height: 300px"></iframe>
								  <div class="card-body">
								    <h5 class="card-title">{{$filme->titulo}}</h5>
								    <p class="card-text"> Género : {{$filme->genero_code}}</p>
								    <p class="card-text"> {{$filme->sumario}}</p>
								    <div class="card-footer">
								    	<a href="#" class="btn btn-primary">Comprar Bilhete</a>
								    </div>
								  </div>
								</div>
		                	@endforeach
		                </div>
	                </div>
	                {{$filmes->withQueryString()->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

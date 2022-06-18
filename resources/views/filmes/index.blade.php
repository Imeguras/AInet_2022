@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	<h3>Filmes</h3>
                </div>
                <div class="card-body">
                	<div>
                		<form action="{{route('filmes')}}">
                			<div class="row">
	                			<div class="col">
								    <label for="FilmeNome">Nome do filme: </label>
								    <input type="text" class="form-control" id="FilmeNome" name="titulo" value="{{old('titulo')}}">
							  	</div>
							  	<div class="col">
									<label for="GeneroSelect">Género: </label>
								    <select class="form-control" id="GeneroSelect" name="genero">
								    	<option value="" @if("" == old('genero')) selected @endif> </option>
									    @foreach($generos as $genero)
									    	<option value="{{$genero->code}}" @if($genero->code == old('genero')) selected @endif>{{$genero->nome}} </option>
									    	}
									    @endforeach
								    </select>
								</div>
							</div>
							<div class="form-group">
							    <label for="FilmeSumario">Sumário do filme: </label>
							    <textarea class="form-control" id="FilmeSumario" rows="3" name="sumario">{{old('sumario')}}</textarea>
							</div>
							<br>
							<button type="submit" class="btn btn-primary btn-lg">Filtrar</button>
                		</form>
                	</div>
                	<br>
                	<div class="card-deck" >
	                	@foreach($filmes as $filme)
	                		<div id= "CardMovie{{$filme->id}}" class="card">
	                			@isset($filme->trailer_url)
							 		<iframe  src="https://www.youtube.com/embed/{{ substr($filme->trailer_url, 32) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="height: 300px"></iframe>
								@endisset
							 	<div class="card-body">
							    <h5 class="card-title">{{$filme->titulo}}</h5>
							    <p class="card-text"> Ano : {{$filme->ano}} </p>
							    <p class="card-text"> Género : {{$filme->genero->nome}}</p>
							    <p class="card-text"> {{$filme->sumario}}</p>
							    <div class="card-footer text-center">
							    	<a href="{{route('sessoes', ['id' => $filme->id])}}" class="btn btn-primary">Ver Sessões</a>
							    	@isset($filme->cartaz_url)
							    		<button class="btn btn-primary" onclick="showHideCartaz({{$filme->id}})">Mostrar cartaz</button>
							    		<img  id ="CartazFilme{{$filme->id}}" src = "{{ asset('storage/cartazes/' . $filme->cartaz_url) }}" class="card-img-bottom" alt="Cartaz filme" style="display: none; width: 300px" > 
							    	@endisset
							    </div>
							  </div>
							</div>
							<br>
	                	@endforeach
	                </div>
                </div>
                {{$filmes->withQueryString()->links()}}
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  function showHideCartaz (id) {
  	var x = document.getElementById("CartazFilme"+id);
  	if (x.style.display === "none") {
    	x.style.display = "block";
  	} else {
    	x.style.display = "none";
  	}
  }
</script>
@endsection

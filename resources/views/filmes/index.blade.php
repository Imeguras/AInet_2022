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
		                			@isset($filme->trailer_url)
								 		<iframe  src="https://www.youtube.com/embed/{{ substr($filme->trailer_url, 32) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="height: 300px"></iframe>
									@endisset
								 	<div class="card-body">
								    <h5 class="card-title">{{$filme->titulo}}</h5>
								    <p class="card-text"> Género : {{$filme->genero_code}}</p>
								    <p class="card-text"> {{$filme->sumario}}</p>
								    <div class="card-footer text-center">
								    	<a href="#" class="btn btn-primary">Comprar Bilhete</a>
								    	@isset($filme->cartaz_url)
								    		<button class="btn btn-primary" onclick="showHideCartaz({{$filme->id}})">Mostrar cartaz</button>
								    		<img  id ="CartazFilme{{$filme->id}}" src = "{{ asset('storage/cartazes/' . $filme->cartaz_url) }}" class="card-img-bottom" alt="Cartaz filme" style="display: none"> 
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

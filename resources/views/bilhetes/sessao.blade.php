@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-8">
			{{--write every $bilhetes to a hidden div--}}
			<div id="bilhetes">
				@foreach ($bilhetes as $key => $bilhete)
				<input id="{{$bilhete->id}}" value="{{$bilhete->estado}}" type="hidden">
					
				@endforeach
			</div>
			{{--on submit launch a javascript function--}}
			
			<div class="input-group">
				<input id="idInput" type="text" class="form-control" placeholder="Validar bilhete nº...">
				<input id="submitId" type="button" class="btn btn-primary" value="Pesquisar">
				
			</div>
			<div class="alert" role="alert">
				<h4 id="resultado" class="alert-heading"></h4>
				<p id="bilheteParam"> </p>
				{{--add a hidden form with a post request to useBilhete--}}
				
				{{--<form id="useBilhete" method="post" action="{{ route('useBilhete') }}">
					@csrf
					<input id="bilheteId" name="bilheteId" type="hidden">
					
				</form>--}}
			</div>
				
			
		</div>
	</div>
</div>
<script>
	document.getElementById("submitId").addEventListener("click", function(e){
		e.preventDefault();
		showEstado();
	});
//read the value of idInput and print the value of the input whose id is the value of idInput
	function showEstado(){
		var idInput = document.getElementById("idInput").value;
		var estado = document.getElementById(idInput).value;
		var bilheteparam = document.getElementById("bilheteParam");
		
		document.getElementById("resultado").innerHTML = estado;
		bilheteparam.innerHTML= "O bilhete verificado é o nº: "+idInput; 
		estado=="não usado"?document.getElementById("resultado").parentElement.className="alert alert-success":document.getElementById("resultado").parentElement.className="alert alert-danger";

	}
</script>
@endsection
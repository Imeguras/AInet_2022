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
				<input id="idInput" type="text" class="form-control" placeholder="Pesquisar...">
				<input id="submitId" type="button" class="btn btn-primary" value="Pesquisar">
				
			</div>
			<div id="resultado">
			</div>
		</div>
	</div>
</div>
<script>
	document.getElementById
//read the value of idInput and print the value of the input whose id is the value of idInput
function showEstado(){
	var idInput = document.getElementById("idInput").value;
	var estado = document.getElementById(idInput).value;
	document.getElementById("resultado").innerHTML = estado;
}
</script>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-8">
			{{--a text box that filters $sessoes--}}
			<div class="input-group">
				<input id="searchInput" type="text" class="form-control" placeholder="Pesquisar..." onkeyup="filterBox()">
				
			</div>
			
		</div>
        <div class="col-md-8">
			@foreach ($sessoes as $key => $sessao)
				<div class="card" id="{{$sessao->id}}">
					<div class="card-header">
				
						<h3 class="theText">{{$sessao->titulo." ".$sessao->data."_".$sessao->horario_inicio." ".$sessao->genero_code." sala:".$sessao->sala_id}}</h3>
						{{-- Button that goes to route validateTicket where $id is the id of the parent--}}
						<button class="btn btn-primary" onclick="window.location.href='{{ route('validateTicket', $sessao->id) }}'">Validar Bilhetes para esta sessao</button>
					</div>

				</div>
			@endforeach
    	</div>
	</div>
</div>
<script>
	//check the h3 innnrHtml inside class "card" and filter according to whats written on the input
	function filterBox(){
		var input, filter, ul, li, a, i;
		input = document.getElementById("searchInput");
		filter = input.value.toUpperCase();
		a = document.getElementsByClassName("theText");
		for (i = 0; i < a.length; i++) {
			if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
				a[i].parentElement.parentElement.style.display = "";
			} else {
				a[i].parentElement.parentElement.style.display = "none";
			}
		}

	}
</script>
@endsection
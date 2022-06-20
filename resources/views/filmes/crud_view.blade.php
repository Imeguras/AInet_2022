@extends('layouts.app')

@section('content')
{{--Displays every $filmes in a list where each row has a title, an image and a button to alter the details--}}
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			{{--submit button that goes to filmes_create--}}
			<form action="{{route('filmes_create')}}" method="GET">
				<button type="submit" class="btn btn-primary">Adicionar Filme</button>
			</form>
		</div>
		<div class="col-md-8">
			{{--a text box that filters $sessoes--}}
			<div class="input-group">
				<input id="searchInput" type="text" class="form-control" placeholder="Pesquisar..." onkeyup="filterBox()">
				
			</div>
			
		</div>
		<div class="col-md-8">			
			@foreach ($filmes as $key => $filme)
				<div class="card" id="{{$filme->id}}">
					<div class="card-header">
						<div class="row-md-0">
							<h3 class="theText">{{$filme->titulo." ".$filme->ano." ".$filme->genero_code}}</h3>
							<form action="{{route('filmes_edit',['id' => $filme->id])}}" method="GET">
								@csrf
								<input value="hidden" type="hidden" name="id" value="{{$filme->id}}">
								<input class="btn btn-primary" type="submit" value="Alterar"></button>
							</form>
							<form action="{{route('filmes_addSessoes')}}" method="POST">
								@csrf
								<input value="hidden" type="hidden" name="id" value="{{$filme->id}}">
								<input class="btn btn-danger" type="submit" value="Adicionar Sessoes"></button>
							</form>
						</div>
					</div>

				</div>
			@endforeach
		</div>
	</div>
</div>
<script>
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
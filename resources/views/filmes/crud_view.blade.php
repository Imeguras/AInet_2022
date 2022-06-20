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
						</div>
					</div>

				</div>
			@endforeach
		</div>
	</div>
</div>

@endsection
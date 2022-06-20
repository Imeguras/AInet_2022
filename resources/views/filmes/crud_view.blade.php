@extends('layouts.app')

@section('content')
{{--Displays every $filmes in a list where each row has a title, an image and a button to alter the details--}}
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">			
			@foreach ($filmes as $key => $filme)
				<div class="card" id="{{$filme->id}}">
					<div class="card-header">
				
						<h3 class="theText">{{$filme->titulo." ".$filme->ano.$sessao->genero_code}}</h3>
						<form action="{{route('filmes_edit')}}" method="GET">
							@csrf
							<input value="hidden" type="hidden" name="id" value="{{$filme->id}}">
							<input class="btn btn-primary" type="submit">Alterar</button>
					</div>

				</div>
			@endforeach
		</div>
	</div>
</div>

@endsection
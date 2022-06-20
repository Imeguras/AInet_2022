@extends('layouts.app')

@section('content')
{{--Create sessions for filme $id --}}
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<form action="{{route('sessoes_create')}}" method="POST">
				<input value="hidden" type="hidden" name="filme_id" value="{{$id}}">
				{{--input select to choose the sala--}}
				<div class="form-group">
					<label for="sala_id">Sala</label>
					<select class="form-control" id="sala_id" name="sala_id">
						@foreach ($salas as $key => $sala)
							<option value="{{$sala->id}}">{{$sala->nome}}</option>
						@endforeach
					</select>
				</div>
				{{--input select to choose the horario--}}
				<div class="form-group">
					<select id="recurrer" class="form-control">
						<option value="1">Dia unico</option>
						<option value="2">Intervalo de dias</option>
						<option value="3">Todas as...</option>
				</div>
				<input class="btn btn-primary" type="submit" value="Adicionar Sessoes"></button>
			</form>
		</div>
	</div>
</div>
<script>
//add an change listener to recurrer select
document.getElementById("recurrer").addEventListener("change", function(){
	var value = this.value;
	if(value == 1){
		//ask for a date and insert that input hidden on the form
	}else if(value == 2){
		//ask for two dates and insert the dates on inputs hidden on the form
	}else if(value == 3){
		//todo demasiado chato
	}
});
</script>
@endsection
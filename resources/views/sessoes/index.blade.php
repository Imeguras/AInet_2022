@extends('layouts.app')

@section('content')
{{--Create sessions for filme $id --}}
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			{{--post to sessoes_create with the id in url--}}

			<form action="{{route('sessoes_create')}}" method="POST">
				<input value="hidden" type="hidden" name="filme_id" value="{{$filme->id}}">
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
						<option value="0">Escolher Comportamento Schedule </option>
						<option value="1">Dia unico</option>
						<option value="2">Intervalo de dias</option>
						<option value="3">Todas as...</option>
					</select>
					<div id="inject_stuff">
					</div>

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
	//remove every child from inject_results
	var inject_stuff = document.getElementById("inject_stuff");
	while (inject_stuff.firstChild) {
		inject_stuff.removeChild(inject_stuff.firstChild);
	}
	
	if(value == 1){
	
		
		

		inject_stuff.innerHTML = '<label for="data">Data:</label>'+
								'<input type="date" class="form-control" id="data1" name="data[]">';
	    
		//ask for a date and insert that input hidden on the form
	}else if(value == 2){
		//ask for two dates and insert the dates on inputs hidden on the form

		inject_stuff.innerHTML = '<label for="data">Data Inicial:</label>'+
								'<input type="date" class="form-control" id="data1" onchange="doStuff()">'+
								'<label for="data">Data Final:</label>'+
								'<input type="date" class="form-control" id="data2" onchange="doStuff()">';
		

	}else if(value == 3){
		//todo demasiado chato
	}
});

function doStuff(){
	//insert every day between data1 and data2 on the form

	var data1 = document.getElementById("data1").value;
	var data2 = document.getElementById("data2").value;
	if(data1==null||data2==null){
		return; 
	}
	
	var inject_stuff = document.getElementById("inject_stuff");
	var date1 = new Date(data1);
	var date2 = new Date(data2);
	var i = date1.getTime();
	var f = date2.getTime();
	var d = new Date(i);
	let foo= 0; 
	while(d <= f){
		foo++;
		var inject_stuff = document.getElementById("inject_stuff");
		inject_stuff.innerHTML = '<label for="data">Data:</label>'+
								'<input type="hidden" class="form-control" id="data'+foo+'" name="data[]" value="'+d.getDate()+'">';
		d.setDate(d.getDate() + 1);
	}
}
</script>
@endsection
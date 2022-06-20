@extends('layouts.app')

@section('content')
{{--Create sessions for filme $id --}}
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			{{--post to sessoes_create with the id in url--}}

			<form action="{{route('sessoes_create')}}" method="POST">
				@csrf
				<input type="hidden" name="filme_id" value="{{$filme->id}}">
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
					<div id="inject_ret">
					</div>
				</div>
				{{--Input to choose various hours--}}
				<div class="form-group">
					<label for="horario">Horario</label>
					<input type="text" class="form-control" id="horario" name="horario_inicio" placeholder="Separar valores com ponto e virgula ie: 10:00; 11:00...">
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
	//remove every child from inject_stuff
	var inject_stuff = document.getElementById("inject_stuff");
	while (inject_stuff.firstChild) {
		inject_stuff.removeChild(inject_stuff.firstChild);
	}
	//remove every child from inject_ret
	var inject_ret = document.getElementById("inject_ret");
	while (inject_ret.firstChild) {
		inject_ret.removeChild(inject_ret.firstChild);
	}
	
	if(value == 1){

		inject_stuff.innerHTML = '<label for="data1">Data:</label>'+
								'<input type="date" class="form-control" id="data1" onchange="doStuff()">'+'<input value="" id="data2" type="hidden">';
	    
		//ask for a date and insert that input hidden on the form
	}else if(value == 2){
		//ask for two dates and insert the dates on inputs hidden on the form

		inject_stuff.innerHTML = '<label for="data1">Data Inicial:</label>'+
								'<input type="date" class="form-control" id="data1" onchange="doStuff()">'+
								'<label for="data2">Data Final:</label>'+
								'<input type="date" class="form-control" id="data2" onchange="doStuff()">';
		

	}else if(value == 3){
		//todo demasiado chato
	}
});

function doStuff(){
	//insert every day between data1 and data2 on the form
	
	var data1 = document.getElementById("data1").value;
	var data2 = document.getElementById("data2").value;
	
	
	var inject_stuff = document.getElementById("inject_stuff");
	var inject_ret = document.getElementById("inject_ret");
	
	if(data1==null){
		return; 
	}else if(data2==""){
		console.log(data1);
		//new element of type input hidden with name data[] and value data1
		var input = document.createElement("input");
		input.setAttribute("type", "hidden");
		input.setAttribute("name", "data[]");
		input.setAttribute("value", data1);
		inject_ret.appendChild(input);
		return;
	}
	
	var date1 = new Date(data1);
	var date2 = new Date(data2);
	var i = date1.getTime();
	var f = date2.getTime();
	var d = new Date(i);
	let foo= 0; 
	while(d <= f){
		foo++;
		//new element of type input hidden with name data[] and value data1 and id "dataRet"+foo
		var input = document.createElement("input");
		input.setAttribute("type", "hidden");
		input.setAttribute("name", "data[]");
		input.setAttribute("value", d.toISOString().substring(0,10));
		input.setAttribute("id", "dataRet"+foo);
		inject_ret.appendChild(input);
		d.setDate(d.getDate() + 1);
	}
}
</script>
@endsection
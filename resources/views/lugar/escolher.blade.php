@extends('layouts.app')

@section('content')
<script type="text/javascript">
	ids = []
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	<h3>Escolher o Lugar</h3>
                </div>
                <div class="card-body">
                	<div class="card">
                		<div class="text-center">
			            	<table class="table table-borderless">
			            		<caption>Lista de Lugares</caption>
							  	<thead>
							    	<tr>
							      		<th scope="col"></th>
							      			@for($i = 0; $i < count($lugares["A"]); $i++)
							      				<th scope="col"> {{$i+1}} </th>
							      			@endfor
							    	</tr>
							  	</thead>
							  	<tbody>
							    	@foreach($lugares as $fila => $lugaresTodos)
							    		<tr>
								    		<th scope="row"> {{$fila}} </th>
									    	@foreach($lugaresTodos as $lugar)
									    		<td>
									    			<button id="lugar{{$lugar->id}}" type="button" class="active btn btn-sm btn-block" onclick="addId({{$lugar->id}})"
										    			@if (in_array($lugar->id, $lugaresOcupados->toArray()))
										    				 disabled><img src="{{asset('storage/images/used_seat.png')}}" alt="used seat" style="width: 100%"> 
										    			@elseif(in_array($lugar->id, $sessaoLugares))
											    			><img src="{{ asset('storage/images/reserved_seat.png')}}" alt="empty seat" style="width: 100%;">
											    		@else
											    			><img src="{{ asset('storage/images/empty_seat.png')}}" alt="empty seat" style="width: 100%;">
										    			@endif
										    		</button>
									    		</td>
									    	@endforeach
									    </tr>
								    @endforeach
							  	</tbody>
							</table>
						</div>
		            </div>
		            <br>
		            <form action="{{route('adicionar')}}" method="POST">
		            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		            	<input type="hidden" name="sessaoID" value="{{$sessao->id}}">
	               		<button type="submit" class="btn btn-primary">Escolher</button>
		            </form>
			    </div>
			</div>
    	</div>
	</div>
</div>
<script type="text/javascript">
	function addId(id){
		
		var form = document.getElementsByTagName("form")[0]
		//console.log(form)
		
		var exists = false;

		Array.from(form.elements).forEach(element => {
			if(element.value == id){

				ids = ids.filter(function(value, index, arr){ 
				        return value != id;
				    });

				var botao = document.getElementById("lugar" + id)
				//console.log(botao)
				var img = botao.getElementsByTagName("img")[0]
				//console.log(img)
				img.src = "{{asset('storage/images/empty_seat.png')}}"
				exists = true;

				form.removeChild(element)
			}
		});

		if(exists){
			return
		}

		ids.push(id)

		//console.log("continued after the foreach")
		var field = document.createElement("input")
		field.setAttribute("type", "checkbox")
		field.setAttribute("name", "lugares[]")
		field.setAttribute("value", id)
		field.setAttribute("checked", "checked")
		field.style.display = 'none'

		//console.log(field)

		form.appendChild(field)
		//console.log(form)

		var botao = document.getElementById("lugar" + id)
		//console.log(botao)
		var img = botao.getElementsByTagName("img")[0]
		//console.log(img)
		img.src = "{{asset('storage/images/reserved_seat.png')}}"
	}
</script>
@foreach($sessaoLugares as $lugar)
	<script type="text/javascript">
		addId({{$lugar}})
	</script>
@endforeach

@endsection
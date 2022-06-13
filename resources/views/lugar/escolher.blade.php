@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	<h3>Escolher o Lugar</h3>
                </div>
                <div class="card-body">
                	<div class="card">
		            	<table class="table table-borderless table-hover">
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
							    			@if (in_array($lugar->id, $lugaresOcupados->toArray()))
							    				<img src="{{asset('storage/images/used_seat.png')}}" alt="used seat" width="25px"> 
							    			@else
								    			<a href="#">
								    				<img src="{{ asset('storage/images/empty_seat.png')}}" alt="empty seat" width="25px">
								    			</a>
							    			@endif
							    		</td>
							    	@endforeach
							    </tr>
						    @endforeach
						  </tbody>
						</table>
		            </div>
		            <br>
	               	<button class="btn btn-primary">Escolher</button>
			    </div>
			</div>
    	</div>
	</div>
</div>
@endsection
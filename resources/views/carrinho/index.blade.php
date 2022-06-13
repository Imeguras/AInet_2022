@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	<h3>{{$filme->titulo}}</h3>
                </div>
                <div class="card-body">
                	<div class="card">
					    <div class="row no-gutters">
				            <div class="col-auto">
				            	<p> Parte à esquerda </p>
				            </div>
				            <div class="col">
				                <div class="card-block px-2">
				                    <h5 class="card-title">Género: </h5>
				                    <p class="card-text">Ano:  </p>
				                    <p class="card-text"></p>
				                </div>
				            </div>
				    	</div>
                	</div>
				</div>
        	</div>
    	</div>
	</div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	<h3>Salas de cinema</h3>
                </div>
                <div class="card-body">
                    <div class="container">
                        <a class="btn btn-primary" href="#">Criar sala</a>
                    </div>
                    <br>
                    @foreach($salas as $sala)
                        <div class="card">
                            <div class="card-header">
                                <h6>{{$sala->nome}}</h6>
                            </div>
                            <div class="card-body">
                                <p>ID: {{$sala->id}} </p>
                                <a class="btn btn-success" href="#"> Editar </a>
                                <a class="btn btn-danger" href="#"> Apagar</a>
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
                    <form method="POST" action="{{ route('admin_salas_save') }}">
                        @csrf
                        <div class="form-group col">
                            <input type="hidden" name="id" id="id" value="{{$sala->id ?? ""}}">
                            <div class="form-group">
                                <label for="nome">Nome da sala: </label>
                                <input type="text" class="form-control" id="nome" placeholder="Nome Sala" value="@if ($sala !== null){{$sala->nome}}@endif" name="nome" required>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="form-group col-sm-5">
                                    <label for="numeroLugares">Número de lugares: </label>
                                    <input type="number" class="form-control" id="numeroLugares" placeholder="100" value=@if ($sala !== null) {{count($sala->lugares)}}@endif name="numeroLugares" required>
                                </div>
                                <br>
                                <div class="form-group col-sm-5">
                                    <label for="lugaresLinha">Lugares por linha: </label>
                                    <input type="number" class="form-control" id="lugaresLinha" placeholder="10" name="lugaresLinha" value = {{ $linha ?? "" }}>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
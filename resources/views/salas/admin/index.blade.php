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
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Sucesso !</h4>
                            <p>{{$message}}</p>
                        </div>
                    @endif
                    <div class="container">
                        <a class="btn btn-primary" href=" {{ route('admin_salas_create') }}">Criar sala</a>
                    </div>
                    <br>
                    @foreach($salas as $sala)
                        <div class="card">
                            <div class="card-header">
                                <h6>{{$sala->nome}}</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>
                                            ID: {{$sala->id}}
                                        </td>
                                        <td>
                                            Estado: {{$sala->deleted_at ? "Apagada" : "Operacional"}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Número de lugares: {{count($sala->lugares)}}
                                        </td>
                                    </tr>
                                </table>
                                <a class="btn btn-success" href=" {{ route('admin_salas_edit', ['id'=>$sala->id]) }}"> Editar </a>
                                <form method="POST" action="{{ route('admin_salas_delete') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$sala->id}}">
                                    <button type="submit" class="btn btn-danger">Apagar</button>
                                </form>
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
                {{$salas->withQueryString()->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
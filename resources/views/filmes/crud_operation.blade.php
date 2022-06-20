@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{--Form with Input for filme titulo, Ano--}}
				<div class="card-header">
					<h3>@isset($filme) Editar Filme @else Adicionar Filme @endisset</h3>
				</div>
				<div class="card-body">
					<form action="@isset($filme) {{route('filmes_update', $filme->id)}} @else {{route('filmes_store')}} @endisset" method="POST">
						@csrf
						<div class="row mb-3">
							<label id="titulo-lbl1" for="titulo-input1" class="col-md-4 col-form-label text-md-end">
								{{ __('O titulo do filme:') }}
							</label>
							<div class="col-md-6">
								<input id="titulo-input1" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="@isset($filme){{$filme->titulo}}@endisset" required autocomplete="titulo">
								@error('titulo')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
						<div class="row mb-3">
							<label id="ano-lbl1" for="ano-input1" class="col-md-4 col-form-label text-md-end">
								{{ __('O ano do filme:') }}
							</label>
							<div class="col-md-6">
								<input id="ano-input1" type="text" class="form-control @error('ano') is-invalid @enderror" name="ano" value="@isset($filme){{$filme->ano}}@endisset" required autocomplete="ano">
								@error('ano')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
					</form>
				</div>
				
        	</div>
    	</div>
	</div>
</div>
@endsection
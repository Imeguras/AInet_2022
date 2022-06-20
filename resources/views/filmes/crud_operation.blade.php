@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
				{{--O titulo--}}
				<div class="card-header">
					<h3>@isset($filme) Editar Filme @else Adicionar Filme @endisset</h3>
				</div>
				<div class="card-body">
					<form action="@isset($filme) {{route('filmes_update', $filme->id)}} @else {{route('filmes_store')}} @endisset" method="POST" enctype="multipart/form-data">
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
						{{--O ano--}}
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
						{{--O genero (select box with all generos)--}}
						<div class="row mb-3">
							<label id="genero-lbl1" for="genero-input1" class="col-md-4 col-form-label text-md-end">
								{{ __('O genero do filme:') }}
							</label>
		
							
							<div class="col-md-6">
								<select id="genero-input1" class="form-control @error('genero') is-invalid @enderror" name="genero_code" required>
									@foreach ($generos as $genero)
										<option value="{{$genero->code}}" @isset($filme) @if($filme->genero_code == $genero->code) selected @endif @endisset>{{$genero->nome}}</option>
									@endforeach
								</select>
								@error('genero')	
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
						{{--O sumario(textarea)--}}
						<div class="row mb-3">
							<label id="sumario-lbl1" for="sumario-input1" class="col-md-4 col-form-label text-md-end">
								{{ __('O sumario do filme:') }}
							</label>
							<div class="col-md-6">
								<textarea id="sumario-input1" class="form-control @error('sumario') is-invalid @enderror" name="sumario" required autocomplete="sumario">@isset($filme){{$filme->sumario}}@endisset</textarea>
								@error('sumario')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
						{{--O url para o trailer--}}
						<div class="row mb-3">
							<label id="trailer-lbl1" for="trailer-input1" class="col-md-4 col-form-label text-md-end">
								{{ __('O url do trailer:') }}
							</label>
							<div class="col-md-6">
								<input id="trailer-input1" type="text" class="form-control @error('trailer') is-invalid @enderror" name="trailer_url" value="@isset($filme){{$filme->trailer_url}}@endisset" required autocomplete="trailer">
								@error('trailer')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
						{{--Upload de imagem--}}
						
						<div class="row mb-3">
							@isset($filme)
							{{--show the current image where the filme->cartaz_url is a file name residing in storage--}}
							<div class="col-md-4">
								<img src="{{asset('storage/cartazes/'.$filme->cartaz_url)}}" class="img-fluid" alt="Cartaz">
							</div>
							@endisset
							<label id="imagem-lbl1" for="imagem-input1" class="col-md-4 col-form-label text-md-end">
								{{ __('Upload de imagem:') }}
							</label>
							<input id="imagem-input1" type="file" accept="image/*" class="form-control @error('imagem') is-invalid @enderror" name="cartaz_url">
							@error('imagem')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

						{{--Custom (textarea)--}}
						<div class="row mb-3">
							<label id="custom-lbl1" for="custom-input1" class="col-md-4 col-form-label text-md-end">
								{{ __('Custom:') }}
							</label>
							<div class="col-md-6">
								<textarea id="custom-input1" class="form-control @error('custom') is-invalid @enderror" name="custom" autocomplete="custom">@isset($filme){{$filme->custom}}@endisset</textarea>
								@error('custom')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
						{{-- the submit button--}}
						<div class="row mb-3">
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary">
									{{ __('Salvar') }}
								</button>
							</div>
						</div>
						
					</form>
				</div>
				
        	</div>
    	</div>
	</div>
</div>

@endsection
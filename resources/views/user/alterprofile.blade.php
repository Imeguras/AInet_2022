@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
				<!--input box for username-->

				
				
                <div class="card-header">{{ __('Your User Profile') }}</div>
				<div class="card-body">	
					<form method="POST" action="{{ route('alterprofilesubmit') }}">	
						@csrf
						<div class="row mb-3">
							<label id="name-lbl1" for="name-input1" class="col-md-4 col-form-label text-md-end">
								{{ __('O teu nome de utilizador:') }}
							</label>
							<div class="col-md-6">
								<input id="name-input1" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name">
								@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<!--If user is client-->
							@if($user->tipo == 'C')
								<label id="nif-lbl1" for="nif-input1" class="col-md-4 col-form-label text-md-end">
									{{ __('O teu NIF(por omissão):') }}
								</label>
								<div class="col-md-6">
									<input id="nif-input1" type="text" class="form-control @error('nif') is-invalid @enderror" name="nif" value="{{$user->nif}}" required autocomplete="nif">
									@error('nif')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<!--Combobox for the tipo_pagamento of $user-->
								<label id="tipo_pagamento-lbl1" for="tipo_pagamento-input1" class="col-md-4 col-form-label text-md-end">
									{{ __('Tipo de Pagamento(por omissão):') }}
								</label>
								<div class="col-md-6">
									<select id="tipo_referencia-input1" class="form-control @error('tipo_pagamento') is-invalid @enderror" name="tipo_pagamento" required autocomplete="tipo_pagamento">
										<option value="VISA" @if($user->tipo_pagamento == 'VISA') selected @endif>VISA</option>
										<option value="PAYPAL" @if($user->tipo_pagamento == 'PAYPAL') selected @endif>PAYPAL</option>
										<option value="MBWAY" @if($user->tipo_pagamento == 'MBWAY') selected @endif>MBWAY</option>
									</select>
									@error('tipo_pagamento')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<!--Input Text for the ref_pagamento of $user-->
								<label id="ref_pagamento-lbl1" for="ref_pagamento-input1" class="col-md-4 col-form-label text-md-end">
									{{ __('Referencia de Pagamento(por omissão):') }}
								</label>
								<div class="col-md-6">
									<input id="ref_pagamento-input1" type="text" class="form-control @error('ref_pagamento') is-invalid @enderror" name="ref_pagamento" value="{{$user->ref_pagamento}}" required autocomplete="ref_pagamento">
									@error('ref_pagamento')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>

							@endif	
						</div>
						
						<div class="row mb-0">
							<div class="col-md-8 offset-md-4">
								<input id="submit1" type="submit" class="btn btn-primary" value="Atualizar Perfil">
								<a id="cancel1" href="{{ route('filmes') }}" class="btn btn-secondary">
									Voltar Atrás
								</a>
							</div>
							<div class="col-md-8 offset-md-4">
								
							</div>
						</div>
						
					</form>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection

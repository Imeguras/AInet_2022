@extends('layouts.app')

@section('content')                      
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	<h3>Pagamento</h3>
                </div>
                <div class="card-body">
					<div class="container">
						<h5>Pagamento através de Cartão VISA: </h5>
						<form method="POST" action="{{ route('pay_with_VISA') }}">
							@csrf
							<div class="form-group row">
								<div class="form-group col-sm-4">
								    <label for="ccNumber">Número do cartão: </label>
								    <input type="number" class="form-control" id="ccNumber" placeholder="4242 4242 4242 4242" value="
								    @if ($cliente->tipo_pagamento !== null && $cliente->tipo_pagamento == 'VISA')
								    	{{$cliente->ref_pagamento}}
								   	@endif" name="ccNumber" required>
							    </div>
							    <br>
							    <div class="form-group col-sm-2">
								    <label for="cvcCode">Código CVC: </label>
								    <input type="number" class="form-control" id="cvcCode" placeholder="123" name="cvcCode" required>
							    </div>
							    <div class="form-group col-sm-4">
								    <label for="nif">NIF: </label>
								    <input type="number" class="form-control" id="nif" placeholder="123456789" name="nif" value = {{$cliente->nif ?? " "}}>
							    </div>
							</div>
							<br>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Pagar com cartão VISA</button>
							</div>
						</form>
					</div>
					<br>
					<div class="container">
						<h5>Pagamento através de Paypal: </h5>
						<form method="POST" action="{{ route('pay_with_PayPal') }}">
							@csrf
							<div class="form-group row">
								<div class="form-group col-sm-4">
								    <label for="email">Email da conta Paypal: </label>
								    <input type="email" class="form-control" id="email" placeholder="example123@mail.pt" name="email" value="
								    @if ($cliente->tipo_pagamento !== null && $cliente->tipo_pagamento == 'PAYPAL')
								    	{{$cliente->ref_pagamento}}
								   	@endif" required>
							    </div>
							    <div class="form-group col-sm-4">
								    <label for="nif">NIF: </label>
								    <input type="number" class="form-control" id="nif" placeholder="123456789" name="nif" value = {{$cliente->nif ?? " "}}>
							    </div>
							</div>
							<br>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Pagar com Paypal</button>
							</div>
						</form>
					</div>
					<br>
					<div class="container">
						<h5>Pagamento através de MB WAY: </h5>
						<form method="POST" action="{{ route('pay_with_MBWAY') }}">
							@csrf
							<div class="form-group row">
								<div class="form-group col-sm-4">
								    <label for="phoneNumber">Número de telemóvel: </label>
								    <input type="number" class="form-control" id="phoneNumber" placeholder="912345678" name="phoneNumber" value="@if ($cliente->tipo_pagamento !== null && $cliente->tipo_pagamento == 'MBWAY')
								    	{{$cliente->ref_pagamento}}
								   	@endif" required>
							    </div>
							    <div class="form-group col-sm-4">
								    <label for="nif">NIF: </label>
								    <input type="number" class="form-control" id="nif" placeholder="123456789" name="nif" value = {{$cliente->nif ?? " "}}>
							    </div>
							</div>
							<br>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Pagar com MB WAY</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
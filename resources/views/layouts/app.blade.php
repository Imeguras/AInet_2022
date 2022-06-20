<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
							
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
								
								<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
									{{--If the user is a admin--}}
									@if(Auth::user()->tipo == 'A') 
										<a class="dropdown-item" href="{{ route('filmes_crud') }}">
											{{ __('Criar e Alterar Filmes/Sessões') }}
										</a>
										<form id="crudFilmes" action="{{ route('filmes_crud') }}" method="GET"  class="d-none">
											@csrf
										</form>
									@endif
									{{-- If its an employee $user->tipo=='F'--}}
									@if(Auth::user()->tipo=='F')
										<a class="dropdown-item" href="{{ route('ticketAccessControl') }}" onclick="event.preventDefault();
										document.getElementById('ticketControll-form').submit();">
											{{ __('Ticket Access Control') }}
										</a>
										<form id="ticketControll-form" action="{{ route('ticketAccessControl') }}" method="GET" class="d-none">
											@csrf
										</form>
									@else
										<a class="dropdown-item" href="{{ route('alterprofile') }}"
											onclick="event.preventDefault();
														document.getElementById('alterprofile-form').submit();">
											{{ __('View/Alter Profile Data') }}
										</a>
										<form id="alterprofile-form" action="{{ route('alterprofile') }}" method="GET" class="d-none">
											@csrf
										</form>
									@endif
                                    @if (Auth::user()->tipo == 'C')
                                        <a class="dropdown-item" href="{{ route('recibos') }}">
                                            Ver Recibos
                                        </a>
                                        <a class="dropdown-item" href=" {{ route('bilhetes') }}">
                                            Ver Bilhetes Ativos
                                        </a>
                                    @endif
									<a class="dropdown-item" href="{{ route('logout') }}"
										onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								
								</div>
                               
                               
                            </li>
                        @endguest
                        @if(Auth::user() == null || Auth::user()->tipo == 'C')
                            <li class="nav-item dropdown">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('carrinho_compras') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                        </svg>
                                    </a>
                                </li>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

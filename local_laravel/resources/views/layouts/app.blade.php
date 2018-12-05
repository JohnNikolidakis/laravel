<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<style>
	.title_td
	{
		font-weight:1000;
		font-size:26px;
	}
	.td_sub
	{
		font-size:13px;
	}
	</style>
</head>
<body>
<div>
	<nav class="d-print-flex navbar navbar-expand-md navbar-laravel navbar-dark bg-primary ">
		<div class="container">
			<ul class="list-unstyled navbar-nav">
				<li class="nav-item">
					<a href="{{ url('/') }}" class="navbar-brand">Laravel</a>
				</li>
				<li class="nav-item @if (\Request::is('/')) active @endif">
					<a class="nav-link" href="{{ url('/') }}">Main Page</a>
				</li>
				<li class="nav-item @if (\Request::is('test')) active @endif">
					<a class="nav-link" href="{{ url('/test') }}">Register</a>
				</li>
				<li class="nav-item @if (\Request::is('vehicle_register')) active @endif">
					<a class="nav-link" href="{{ url('/vehicle_register') }}">Vehicle Register</a>
				</li>
				<li class="nav-item @if (\Request::is('garbage_register') or \Request::is('garbage_register_edit') or \Request::is('garbage_bin_table') or \Request::is('garbage_bin_edit')) active @endif">
					<a class="nav-link" href="{{ url('/garbage_register') }}">Garbage Register</a>
				</li>
				<li class="nav-item @if (\Request::is('ajax')) active @endif">
					<a class="nav-link" href="{{ url('/ajax') }}">Ajax</a>
				</li>
			</ul>
			<ul class="list-unstyled navbar-nav">
				@guest
					<li class="nav-item @if (\Request::is('login')) active @endif">
						<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
					</li>
					<li class="nav-item @if (\Request::is('register')) active @endif">
						@if (Route::has('register'))
							<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
						@endif
					</li>
				@else
					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('logout') }}"
							   onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</li>
				@endguest
			</ul>
		</div>
	</nav>
</div>
<main class="py-4">
	@yield('content')
</main>
</body>
</html>
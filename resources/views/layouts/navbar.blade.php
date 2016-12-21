@section('logout')
	<li><a href="{{ url('/logout') }}" 
		onclick="event.preventDefault();document.getElementById('logout-form').submit();">
		Logout</a>
		<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
	</li>
@endsection

@section('navegacao')
	@if (Auth::guest())
	<li><a href="{{ url('/login') }}">Login</a></li>
	<li><a href="{{ url('/register') }}">Register</a></li>
	@else
	<li><a href="#">Concursos</a></li>
	<li><a href="#">Minhas Apostas</a></li>
	@endif
@endsection
@section('usuario')
	<li><a href="#">Dados de cadastro</a></li>
	<li><a href="#">Trocar Senha</a></li>
	<li class="divider"></li>
	@yield('logout')
@endsection

@if (!Auth::guest())
<ul id="app-menu" class="dropdown-content">
	@yield('usuario')
</ul>
@endif

<nav>
	<div class="nav-wrapper">
		<a href="/" class="brand-logo center">Aposta Certa</a>
		<ul class="right hide-on-med-and-down">
			@yield('navegacao')
			@if (!Auth::guest())
			<li><a class="dropdown-button" href="#!" data-activates="app-menu">
			{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
			@endif
		</ul>

		<a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
		<ul class="side-nav" id="mobile-menu">
			@yield('navegacao')
			@if (!Auth::guest())
			<li><a href="#">{{ Auth::user()->name }}</a></li>
			@yield('usuario')
			@endif
		</ul>
	</div>
</nav>
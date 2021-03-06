@section('logout')
	<li title="Sair"><a href="{{ url('/logout') }}" 
		onclick="event.preventDefault();document.getElementById('logout-form').submit();">
		Sair</a>
	</li>
@endsection

@section('navegacao')
	@if (Auth::guest())
	<li title="Login"><a href="{{ url('/login') }}">Login</a></li>
	<li title="Registrar"><a href="{{ url('/register') }}">Registrar</a></li>
	@else
	<li title="Concursos"><a href="{{ url('/home') }}">Cálculos</a></li>
	@if(Auth::user()->privilegio == 'administrador')
	<li title="Minhas Apostas"><a href="{{ url('/apostas') }}">Minhas Apostas</a></li>
	@endif
	@endif
@endsection

@section('administrador')
	<li title="Configurações"><a href="#">Configurações</a></li>
	<li title="Mega Sena"><a href="{{ url('/megasena') }}">Mega Sena</a></li>
	<li title="Usuários"><a href="{{ url('/usuario') }}">Usuários</a></li>
@endsection

@section('usuario')
@if (!Auth::guest())
@if(Auth::user()->privilegio == 'administrador')
	<li title="Dados de cadastro"><a href="#">Dados de cadastro</a></li>
	<li title="Trocar Senha"><a href="#">Trocar Senha</a></li>
	<li class="divider"></li>
@endif
@endif
	@yield('logout')
@endsection

@if (!Auth::guest()) 
<ul id="app-menu" class="dropdown-content">
	@yield('usuario')
</ul>
	@if(Auth::user()->privilegio == 'administrador')
	<ul id="app-adm" class="dropdown-content">
		@yield('administrador')
	</ul>
	@endif
@endif

<nav>
	<div class="nav-wrapper">
		<a href="/" class="brand-logo center" title="Aposta Certa">Aposta Certa</a>
		<ul class="right hide-on-med-and-down">
		@yield('navegacao')

		@if (!Auth::guest())
			<li title="{{ Auth::user()->name }}"><a class="dropdown-button" href="#!" data-activates="app-menu">
			<i class="material-icons right" style="margin-left: 0px;">arrow_drop_down</i>{{ Auth::user()->name }}</a></li>

			@if(Auth::user()->privilegio == 'administrador')
				<li title="Configurações"><a class="dropdown-button" href="#!" data-activates="app-adm">
				<i class="material-icons">more_vert</i></a></li>
			@endif
		@endif
		</ul>

		<a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
		<ul class="side-nav" id="mobile-menu">
		<li class="teal darken-2"><a href="#"><b class="white-text">Menu</b></a></li>

		@yield('navegacao')

		@if (!Auth::guest())
			<li class="divider"></li>
			@if(Auth::user()->privilegio == 'administrador')
				@yield('administrador')
				<li class="divider"></li>
			@endif
			@yield('usuario')
		@endif
		</ul>
	</div>
</nav>

<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
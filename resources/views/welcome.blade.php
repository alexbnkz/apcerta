@extends('layouts.app')

@section('title', 'Inteligência Matemática')

@extends('layouts.navbar')

@section('stylesheet')
<style type="text/css">
.parallax-container {
	height: 300px;
}
.panel-body {
	line-height: 200%;
}
</style>
@endsection

@section('content')
<div class="section white">
	<div class="row container">
		<div class="panel panel-default">
			<div class="title m-b-md center">
				Aposta Certa
			</div>
			<h3 class="center">Inteligência Matemática pra você apostar certinho!</h3>
			<div class="panel-body">
				<p>Se você precisa calcular probabilidades pra fazer apostas 
				mas dormiu nas aulas de matemática do colegial, seus problemas acabaram!</p>

				<p>Na Megasena:<br />
				Você só tem 6 dezenas de 60.<br />
				Com R$3,50. <br />
				Sua probabilidade de acertar o jogo premiado é de <b>1 em 50.063.860</b></p>
			</div>
		</div>
	</div>
</div>
<div class="parallax-container">
	<div class="parallax"><img src="img/abaco.jpg"></div>
</div>

<div class="section white">
	<div class="row container">
		<div class="panel panel-default">
			<div class="panel-heading">Técnicas</div>
			<div class="panel-body">
				<p>
					Existem algumas técnicas matemáticas para tentar diminuir a probabilidade de erros. Pessoas inexperientes fazem seus cálculos baseados em <b>achismos</b> e dificilmente acertam. Os céticos dirão que a probabilidade é de 50% sempre.<br />
					Mas o sonho de acertar é maior do que 50% então mãos à obra.</p>

				<p>
					<h5>Técnicas de aposta para jogadores inexperientes:</h5>
					<blockquote>
					<ul>
						<li>Números pares/ímpares;</li>
						<li>Aniversário dos filhos;</li>
						<li>Placa de carro;</li>
						<li>Sonhou com o número do animal;</li>
					</ul>
					</blockquote></p>
				<p>
					Apesar do parente do seu vizinho ter acertado a quadra jogando no dia do aniversário dos filhos, <em>pare pra pensar:</em> <br />
					<b>O máximo de dias num mês é 31 ou 30</b> <br />
					Se cair um 46, 59 ou 60 já era né?<br />
					Tem gente que há anos aposta na mesma sequência de números e nunca acerta.
					</p>
			</div>
		</div>
	</div>
</div>

<div class="section teal darken-3 white-text">
	<div class="row container">
		<div class="panel panel-default">
			<div class="panel-body">
				<p>
					<h5>Saia da mesmice!</h5>
					Divirta-se fazendo cálculos. <br />
					Coloque suas conspirações em dia. <br /><br />
					<img class="materialboxed" src="img/nazare.gif"></p>
			</div>
		</div>
	</div>
</div>

<div class="section white">
	<div class="row container">
		<div class="panel panel-default">
			<div class="panel-body">
				<p>Faça seu cadastro clicando <a href="{{ url('/register') }}" class="link" title="Registre-se">aqui</a>.</p>
			</div>
		</div>
	</div>
</div>

@endsection

@section('javascript')
<script type="text/javascript">
	$(document).ready(function(){
		$('.parallax').parallax();
		$('.materialboxed').materialbox();
	});
</script>
@endsection
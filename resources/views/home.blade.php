@extends('layouts.app')

@section('title', 'Concursos')

@extends('layouts.navbar')

<?php

function geraResultado($res) {
	$dezenas = ['01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50','51','52','53','54','55','56','57','58','59','60'];

	$cont = 1;
	$retorno = '<table class="jogo"><tr>';
	foreach ($dezenas as $num) {
		if(array_search($num, explode('-', $res))>-1) {
			$retorno .= '<td class=yes>'.$num.'</td>';
		}
		else {
			$retorno .= '<td class=no>'.$num.'</td>';
		}
		if($cont == 10) {
			$retorno .= '</tr><tr>';
			$cont = 1;
		}
		else {
			$cont++;
		}
	}
	$retorno .= '</tr></table>';
	return str_replace('<tr></tr>', '', $retorno);
}
?>

@section('stylesheet')
<style type="text/css">
.yes {
	font-size: 10px;
	color: #000;
	font-weight: 600;
	padding: 2px;
	text-align: center;
	width: 20px!important;
	height: 15px!important;
}
.no {
	font-size: 10px;
	color: #333;
	font-weight: 100;
	padding: 2px;
	text-align: center;
	width: 20px!important;
	height: 15px!important;
}
.jogo {
	width:200px; 
	height:60px;
	background: url('img/background-jogo.jpg') center center no-repeat;
}
</style>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Concursos</div>

				<div class="panel-body">
					<table class="bordered">
						<thead>
						  <tr>
							  <th width="75" data-field="Concurso" class="center">Número</th>
							  <th width="250" data-field="Dezenas" class="center">Dezenas</th>
							  <th width="200">Canvas</th>
							  <th>Set</th>
						  </tr>
						</thead>

						<tbody>
						@foreach($megasena as $jogo)
							<tr>
								<td id="{{ $jogo->numeroConcurso }}" class="center">{{ $jogo->numeroConcurso }}</td>
								<td class="center">{{ $jogo->resultado }}</td>
								<td>
								<canvas id="myCanvas{{ $jogo->numeroConcurso }}" width="200" height="90" style="border:1px solid #d3d3d3;z-index:99;position:absolute;"></canvas>
								<?php echo geraResultado($jogo->resultado) ?>
								</td>
								<td>
									dd
								</td>
							</tr>
						@endforeach
						</tbody>
					  </table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('javascript')
<script>
function tracado(numeroConcurso, a, b) {

	var c = document.getElementById("myCanvas"+numeroConcurso);
	var ctx = c.getContext("2d");

	var col_ini = 5;
	var col_fim = 10;
	var lin_ini = 12;
	var lin_fim = 12;

	col_ini = col_ini + (19*((a-1)%10))+((a-1)%10);
	col_fim = col_fim + (19*((b-1)%10))+((b-1)%10);

	lin_ini = lin_ini + 12+(15*(Math.floor(a/10)-1)+Math.floor(a/10));
	lin_fim = lin_fim + 12+(15*(Math.floor(b/10)-1)+Math.floor(b/10));

	if (Math.floor(b%10)==0) {
		lin_fim= lin_fim-15;
	}

	//col_ini = col_ini + (5/3);
	//col_ini = col_ini + (5/3);

	ctx.beginPath();
	/*ctx.moveTo(col_ini,	lin_ini);
	ctx.lineTo(col_fim,	lin_fim);*/
	
	ctx.rect(col_ini-5,lin_ini-8,col_fim,10);

	ctx.stroke();
}	

$(document).ready(function(){
	tracado(1889, 23, 30);
});
</script>
@endsection
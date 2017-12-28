@extends('layouts.app')

@section('title', 'Cálculos')

@extends('layouts.navbar')

<?php

function geraResultado($res) {
	$dezenas = ['01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50','51','52','53','54','55','56','57','58','59','60'];

	$cont = 1;
	$retorno = '<table class="jogo'.(($res == '')? ' novo' : '').'"><tr>';

	foreach ($dezenas as $num) {
		$achou = array_search($num, explode('-', $res))>-1;

		if($achou) {
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

function geraTracado($concuso, $res) {
	$dezenas = ['01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50','51','52','53','54','55','56','57','58','59','60'];

	$cont = 1;
	$intervalo = '';
	$min = 0;
	$max = 0;

	foreach ($dezenas as $num) {
		$achou = array_search($num, explode('-', $res))>-1;

		if($achou) {
			if ($min == 0) {
				$min = intval($num);
			} else if ($min > intval($num)) {
				$min = intval($num);
			}
			if ($max == 0) {
				$max = intval($num);
			} else if ($max < intval($num)) {
				$max = intval($num);
			}
		}

		if($cont == 10) {
			if($min!=$max) {
				$intervalo .= 'tracado('.$concuso.','.$min.','.$max.');
				';
			}
			$cont = 1;
			$min = 0;
			$max = 0;
		}
		else {
			$cont++;
		}
	}

	return $intervalo;
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
	height:90px;
	z-index:100;position:absolute;
	background:none;
}
.td_jogo {
	width:200px; 
	/* height:90px; */
	display: block;
	background: url('img/background-jogo.jpg') center center no-repeat; 
}
</style>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Cálculos</div>

				<div class="panel-body">
					<div class="col s12 m6">
						<div class="card">
							<div class="card-content">
								<form role="form" method="POST" action="{{ url('/home') }}">
								{{ csrf_field() }}
								
								<span class="card-title">Configurações</span>
								<p>
									<input type="checkbox" class="filled-in" checked id="quadrante"> 
									<label for="quadrante">Quadrantes</label></p>
								<p>
									<input type="checkbox" class="filled-in" checked id="linhas"> 
									<label for="linhas">Linhas</label></p>
								<p>
									<input type="text" id="buscar" name="buscar" class="form-control"></p>
								
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="panel-body">
					<table class="bordered">
						<thead>
						  <tr>
							  <th width="75" data-field="Concurso" class="center">Concurso</th>
							  <th width="250" data-field="Obs" class="center">Obs</th>
							  <th width="250" data-field="Dezenas" class="center">Resultado</th>
							  <th width="200" data-field="Dezenas">Volante</th>
							  <th></th>
						  </tr>
						</thead>
						<tbody>
							<tr>
								<td id="{{ ($megasena->count()>0)?$megasena[0]->numeroConcurso + 1: '' }}" class="center">{{ ($megasena->count()>0)?$megasena[0]->numeroConcurso + 1: '' }}</td>
								<td class="center"><b>futuro jogo</b></td>
								<td class="center">-</td>
								<td class="td_jogo" width="200" height="120">
									<?php echo geraResultado('') ?>
								</td>
								<td>
									
								</td>
							</tr> 

						@foreach($megasena as $jogo)
							<tr>
								<td id="{{ $jogo->numeroConcurso }}" class="center">{{ $jogo->numeroConcurso }}</td>
								<td class="center"><b>{{ $jogo->observacao }}</b></td>
								<td class="center">{{ $jogo->resultado }}</td>
								<td class="td_jogo" width="200">
								<?php echo geraResultado($jogo->resultado) ?>
								<canvas id="myCanvas{{ $jogo->numeroConcurso }}" class="myCanvas" 
								width="200" height="90" style="z-index:99;position:relative;background:none;"></canvas>
								</td>
								<td>
									
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
$('#linhas').click(function() {
	showHideClass('.myCanvas');
	$('.td_jogo').height(90);
});	
$('#quadrante').click(function() {
	showHideBackground('.td_jogo', this.checked);
	$('.td_jogo').height(90);
});	

$('.novo td.no, .novo td.yes').click(function() {
	if ($(this).attr('class') != 'no') {
		$(this).removeClass('yes').addClass('no');
	}
	else {
		$(this).removeClass('no').addClass('yes');
	}
});	

function showHideClass(tag) {
	$(tag).each(function() {
		if ($(this).css('display') != 'none') {
			$(this).css('display', 'none');	
		}
		else {
			$(this).css('display', '');
		}
	});	
}

function showHideBackground(tag, checked) {
	$(tag).each(function() {
		if (checked) {
			$(this).removeAttr('style', '');
		}
		else {
			$(this).css('background', 'none');
		}
	});	
}

function tracado(numeroConcurso, a, b) {

	var c = document.getElementById("myCanvas"+numeroConcurso);
	var ctx = c.getContext("2d");

	var col_ini = 0;
	var col_fim = 15;
	var lin_ini = 4;
	var lin_fim = 12;

	col_ini = col_ini + (19*((a-1)%10))+((a-1)%10);
	col_fim = col_fim + (19*((b-1)%10))+((b-1)%10);

	lin_ini = lin_ini + 12+(15*(Math.floor(a/10)-1)+Math.floor(a/10));
	lin_fim = lin_fim + 12+(15*(Math.floor(b/10)-1)+Math.floor(b/10));

	if (Math.floor(b%10)==0) {
		lin_fim= lin_fim-15;
	}

	col_fim= col_fim-col_ini;

	ctx.beginPath();
	ctx.globalAlpha=0.7;
	ctx.fillStyle="yellow";
	ctx.fillRect(col_ini, lin_ini, col_fim, 10);
	ctx.stroke();
}	

$(document).ready(function() {
	@foreach($megasena as $jogo)
{!!geraTracado($jogo->numeroConcurso, $jogo->resultado)!!}@endforeach
});
</script>
@endsection
@extends('layouts.app')

@section('title', 'Mega Sena')

@extends('layouts.navbar')

@section('stylesheet')
<link rel="stylesheet" type="text/css" media="screen" href="/assets/bower/jqGrid/css/ui.jqgrid.css" />  
<link rel="stylesheet" type="text/css" media="screen" href="/assets/bower/jquery-ui/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/assets/bower/jquery-ui/themes/smoothness/theme.css" /> 
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Mega Sena</div>

				<form method="post" id="post-form">
					<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				</form>

				<div class="panel-body">
					<table id="jqgrid"></table>
					<div id="jqGridPager" style="height: 50px;"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('javascript')

<script src="/assets/bower/jqGrid/js/jquery.jqGrid.js"></script>
<script src="/js/jqgrid/grid.locale-pt-br.min.js"></script>

<script type="text/javascript"> 


	$(document).ready(function() {
		//$.support.cors = true;

		$.ajax({
			type: "post",
			url: '{{ url('megasena/resultado') }}',
			data: $("#post-form").serialize(),
			dataType: "json",
			success: function(data) { 
				alert(data);
			}
		});

		/*$.getJSON("http://wsloterias.azurewebsites.net/api/sorteio/getresultado/1", function(data) {

			alert( data.NumeroConcurso );

		});*/

		/*var script = document.createElement('script');
		script.src = 'http://wsloterias.azurewebsites.net/api/sorteio/getresultado/1'; // + outros parâmetros
		alert(script.NumeroConcurso);*/

		/*$.ajax({
			type: "post",
			url: '{{ url('megasena/resultado') }}',
			data: $("#post-form").serialize(),
			dataType: "json",
			contentType: "application/json; charset=utf-8",
			success: function (result) {
				debugger;

				$.each(result.callback, function (index, value) {
					alert(index + ': ' + value.Name);
				});
			},
			failure: function (result) { alert('Fail'); }
		});*/
	});

	$(document).ready(function() {

		$("#jqgrid").jqGrid({
			url : "{{ url('megasena/json') }}",
			data : "{}",
			datatype : "json",
			type : "get",
			height : 'auto',
			rowNum : 10,
			rowList : [10, 20, 30],
			pager : '#jqGridPager',
			sortname : 'OrderID',
			gridview: true,
			toolbarfilter : true,
			viewrecords : true,
			sortorder : "asc",
			multiselect : false,
			autowidth : true,
			shrinkToFit: false,

			colModel: [
				{ label: 'OrderID', name: 'OrderID', key: true, width: 75 },
				{ label: 'Customer ID', name: 'CustomerID', width: 150 },
				{ label: 'Freight', name: 'Freight', width: 150 },
				{ label:'Ship Name', name: 'ShipName', width: 150 }
			],
		});

		jQuery("#jqgrid").jqGrid('navGrid', "#jqGridPager", {
			edit : false,
			add  : false,
			refresh:true,
			view : false,
			del  : false,
			search:true,
			add  : false,
		},
		{ /* edit options */ },
		{ /* add options */ },
		{ /* delete options */ },
		{ /* search options */
			 caption: "Pesquisa",
			 Find: "Encontrar",
			 Reset: "Resetar",
			 sopt: ['cn', 'nc', 'eq','ne'],
			
		});

		jQuery("#jqgrid").jqGrid('gridResize');
		jQuery("#input_jqGridPager").attr("width", "100px");
	})

	$(window).on('resize.jqGrid', function() {
		$("#jqgrid").jqGrid('setGridWidth', $("#content").width());
	});

	$(document).ready(function() {
		$("#jqgrid").jqGrid('setGridWidth', $("#content").width());
	});
</script>
@endsection

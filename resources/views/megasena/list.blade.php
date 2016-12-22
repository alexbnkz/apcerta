@extends('layouts.app')

@section('title', 'Mega Sena')

@extends('layouts.navbar')

@section('stylesheet')
<!-- <link rel="stylesheet" type="text/css" media="screen" href="/assets/bower/jqGrid/css/ui.jqgrid-bootstrap-ui.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/assets/bower/jqGrid/css/ui.jqgrid-bootstrap.css" />  -->
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

		$("#jqgrid").jqGrid({
			url : "http://trirand.com/blog/phpjqgrid/examples/jsonp/getjsonp.php?callback=?&qwery=longorders",
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
	    jQuery("#input_jqGridPager").attr("width", "200px");
	})

	$(window).on('resize.jqGrid', function() {
		$("#jqgrid").jqGrid('setGridWidth', $("#content").width());
	});

	$(document).ready(function() {
		$("#jqgrid").jqGrid('setGridWidth', $("#content").width());
	});
</script>
@endsection

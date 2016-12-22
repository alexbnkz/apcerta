@extends('layouts.app')

@section('title', 'Home')

@extends('layouts.navbar')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Concursos</div>

				<div class="panel-body">
					<table class="striped">
						<thead>
						  <tr>
							  <th data-field="id">Name</th>
							  <th data-field="name">Item Name</th>
							  <th data-field="price">Item Price</th>
						  </tr>
						</thead>

						<tbody>
						  <tr>
							<td>Alvin</td>
							<td>Eclair</td>
							<td>$0.87</td>
						  </tr>
						  <tr>
							<td>Alan</td>
							<td>Jellybean</td>
							<td>$3.76</td>
						  </tr>
						  <tr>
							<td>Jonathan</td>
							<td>Lollipop</td>
							<td>$7.00</td>
						  </tr>
						</tbody>
					  </table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Mega Sena :: Registrar')

@extends('layouts.navbar')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Mega Sena</div>

				<div class="panel-body">
					Cadastro de concursos da Mega Sena
				</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/megasena/save') }}">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('numeroConcurso') ? ' has-error' : '' }}">
							<label for="numeroConcurso" class="col-md-4 control-label">Concurso</label>

							<div class="col-md-6">
								<input id="numeroConcurso" type="text" class="form-control" name="numeroConcurso" value="{{ old('numeroConcurso') }}" required autofocus>

								@if ($errors->has('numeroConcurso'))
									<span class="help-block">
										<strong>{{ $errors->first('numeroConcurso') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('observacao') ? ' has-error' : '' }}">
							<label for="observacao" class="col-md-4 control-label">Obs </label>

							<div class="col-md-6">
								<input id="observacao" type="text" class="form-control" name="observacao" value="{{ old('observacao') }}" required>

								@if ($errors->has('observacao'))
									<span class="help-block">
										<strong>{{ $errors->first('observacao') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('resultado') ? ' has-error' : '' }}">
							<label for="resultado" class="col-md-4 control-label">Resultado </label>

							<div class="col-md-6">
								<input id="resultado" type="text" class="form-control" name="resultado" value="{{ old('resultado') }}" required>

								@if ($errors->has('resultado'))
									<span class="help-block">
										<strong>{{ $errors->first('resultado') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary right">
									Save
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

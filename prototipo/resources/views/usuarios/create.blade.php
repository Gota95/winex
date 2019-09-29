@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Usuario</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'usuarios','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					<label for="name">Nombre</label>


							<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

							@if ($errors->has('name'))
									<span class="help-block">
											<strong>{{ $errors->first('name') }}</strong>
									</span>
							@endif

			</div>

			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email" >Correo Electronico</label>


							<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

							@if ($errors->has('email'))
									<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
									</span>
							@endif

			</div>

			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="password" >Contraseña</label>


							<input id="password" type="password" class="form-control" name="password" required>

							@if ($errors->has('password'))
									<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
									</span>
							@endif

			</div>

			<div class="form-group">
					<label for="password-confirm" >Confirmar Contraseña</label>


							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

			</div>


			<div class="form-group">
				<label for="rol" >Rol del Usuario</label>


					<select name="rol" class="form-control">
						<option value="secretaria">Secretaria</option>
						<option value="docente">Docente</option>
						<option value="director">Director</option>
					</select>


			</div>


			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection

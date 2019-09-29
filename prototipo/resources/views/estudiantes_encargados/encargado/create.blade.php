@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Encargado</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

			{!!Form::open(array('url'=>'estudiantes_encargados/encargado','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nombres">Nombre</label>
						<input type="text" name="nombres" required value="{{old('nombres')}}" class="form-control" placeholder="Nombre...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="apellidos">Apellidos</label>
						<input type="text" name="apellidos" required value="{{old('apellidos')}}" class="form-control" placeholder="Apellidos...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    			<div class="form-group">
    				<label for="fecha_nac">Fecha de Nacimiento</label>
    				<input type="date" name="fecha_nac" value="{{old('fecha_nac')}}" class="form-control">
    			</div>
    		</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="direccion">Direccion</label>
						<input type="text" name="direccion" value="{{old('direccion')}}" class="form-control" placeholder="Direccion...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="telefono">telefono</label>
						<input type="text" name="telefono" required value="{{old('telefono')}}" class="form-control" placeholder="Telefono...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="cui">CUI</label>
						<input type="text" name="cui" required value="{{old('cui')}}" class="form-control" placeholder="CUI...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="parentesco">Parentesco</label>
						<input type="text" name="parentesco" required value="{{old('parentesco')}}" class="form-control" placeholder="parentesco...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="users_id">Genero </label>
						<select data-live-search="true" name="genero_id" id="genero_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($generos as $gen)
								<option value="{{$gen->id}}">{{$gen->genero}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="users_id">Estudiante a su Cargo </label>
						<select data-live-search="true" name="estudiante_id" id="estudiante_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($estudiantes as $est)
								<option value="{{$est->id}}">{{$est->nombres.' '.$est->apellidos}}</option>
							@endforeach
						</select>
					</div>
				</div>



			</div>


			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection

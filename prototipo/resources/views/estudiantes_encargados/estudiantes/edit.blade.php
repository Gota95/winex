@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Estudiante: {{$estudiante->nombres.' '.$estudiante->apellidos}}</h3>
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

			{!!Form::model($estudiante,['method'=>'PATCH','route'=>['estudiantes.update',$estudiante->id]])!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="codigo">Codigo</label>
						<input type="text" name="codigo" required value="{{$estudiante->codigo}}" class="form-control" placeholder="Codigo...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nombres">Nombre</label>
						<input type="text" name="nombres" required value="{{$estudiante->nombres}}" class="form-control" placeholder="Nombre...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="apellidos">Apellidos</label>
						<input type="text" name="apellidos" required value="{{$estudiante->apellidos}}" class="form-control" placeholder="Apellidos...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    			<div class="form-group">
    				<label for="fecha_nac">Fecha de Nacimiento</label>
    				<input type="date" name="fecha_nac" value="{{$estudiante->fecha_nac}}" class="form-control">
    			</div>
    		</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="direccion">Direccion</label>
						<input type="text" name="direccion" value="{{$estudiante->direccion}}" class="form-control" placeholder="Direccion...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="clave">Clave</label>
						<input type="text" name="clave" required value="{{$estudiante->clave}}" class="form-control" placeholder="clave...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="certificado">Certificado</label>
						<input type="file" name="certificado" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="foto">Foto</label>
						<input type="file" name="foto" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="estado">Estado</label>
						<input type="text" name="estado" required value="{{$estudiante->estado}}" class="form-control" placeholder="estado...">
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
			</div>



			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection

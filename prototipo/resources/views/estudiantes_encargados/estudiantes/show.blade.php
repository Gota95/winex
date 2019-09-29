@extends('layouts.admin')
@section('contenido')

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
          <label for="Genero">Genero</label>
          <input disabled  type="text" name="genero" required value="{{$estudiante->genero}}" class="form-control" placeholder="Genero...">
        </div>
      </div>


    </div>

@endsection

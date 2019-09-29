@extends('layouts.admin')
@section('contenido')

	  <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="nombres">Nombre</label>
					<input type="text" name="nombres" required value="{{$encargado->nombres}}" class="form-control" placeholder="Nombre...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="apellidos">Apellidos</label>
					<input type="text" name="apellidos" required value="{{$encargado->apellidos}}" class="form-control" placeholder="Apellidos...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="fecha_nac">Fecha de Nacimiento</label>
					<input type="date" name="fecha_nac" value="{{$encargado->fecha_nac}}" class="form-control">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="direccion">Direccion</label>
					<input type="text" name="direccion" value="{{$encargado->direccion}}" class="form-control" placeholder="Direccion...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="telefono">telefono</label>
					<input type="text" name="telefono" required value="{{$encargado->telefono}}" class="form-control" placeholder="Telefono...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="cui">CUI</label>
					<input type="text" name="cui" required value="{{$encargado->cui}}" class="form-control" placeholder="CUI...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="parentesco">Parentesco</label>
					<input type="text" name="parentesco" required value="{{$encargado->parentesco}}" class="form-control" placeholder="parentesco...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="Genero">Genero</label>
          <input disabled  type="text" name="genero" required value="{{$encargado->genero}}" class="form-control" placeholder="Genero...">
        </div>
      </div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="Genero">Estudiante a su Cargo</label>
          <input disabled  type="text" name="genero" required value="{{$encargado->nombre_estudiante.' '.$encargado->apellido_estudiante}}" class="form-control" placeholder="Genero...">
        </div>
      </div>


    </div>

@endsection

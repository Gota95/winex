@extends('layouts.admin')
@section('contenido')

	  <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="nombres">Nombre</label>
					<input type="text" name="nombres" required value="{{$personal->nombres}}" class="form-control" placeholder="Nombre...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="apellidos">Apellidos</label>
					<input type="text" name="apellidos" required value="{{$personal->apellidos}}" class="form-control" placeholder="Apellidos...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="fecha_nac">Fecha de Nacimiento</label>
					<input type="date" name="fecha_nac" value="{{$personal->fecha_nac}}" class="form-control">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="lugar_nac">Lugar de Nacimiento</label>
				<input type="text" name="lugar_nac" value="{{$personal->lugar_nac}}" class="form-control" placeholder="Lugar de Nacimiento...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="estado_civil">Estado Civil</label>
					<input type="text" name="estado_civil" value="{{$personal->estado_civil}}" class="form-control" placeholder="Estado Civil...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="direccion">Direccion</label>
					<input type="text" name="direccion" value="{{$personal->direccion}}" class="form-control" placeholder="Direccion...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="inicio_labores">Inicio de Labores</label>
					<input type="date" name="inicio_labores" value="{{$personal->inicio_labores}}" class="form-control">
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
					<label for="cui">CUI</label>
					<input type="text" name="cui" required value="{{$personal->cui}}" class="form-control" placeholder="CUI...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="telefono">telefono</label>
					<input type="text" name="telefono" required value="{{$personal->telefono}}" class="form-control" placeholder="Telefono...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="correo">Correo</label>
					<input type="text" name="correo" required value="{{$personal->correo}}" class="form-control" placeholder="Correo...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="estado">Estado</label>
					<input type="text" name="estado" required value="{{$personal->estado}}" class="form-control" placeholder="Estado...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="cargo_id">Cargo</label>
          <input disabled  type="text" name="cargo_id" required value="{{$personal->cargo}}" class="form-control" placeholder="Cargo...">
        </div>
      </div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="users_id">Usuario</label>
          <input disabled  type="text" name="users_id" required value="{{$personal->usuario}}" class="form-control" placeholder="Usuario...">
        </div>
      </div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="centro_id">Centro</label>
          <input disabled  type="text" name="centro_id" required value="{{$personal->centro}}" class="form-control" placeholder="Centro...">
        </div>
      </div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="Genero">Genero</label>
          <input disabled  type="text" name="genero" required value="{{$personal->genero}}" class="form-control" placeholder="Genero...">
        </div>
      </div>


    </div>

@endsection

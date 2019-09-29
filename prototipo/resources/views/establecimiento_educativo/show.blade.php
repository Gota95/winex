@extends('layouts.admin')
@section('contenido')

	  <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input disabled type="text" name="nombre" required value="{{$centro->nombre}}" class="form-control" placeholder="Nombre...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="direccion">Direccion</label>
					<input disabled type="text" name="direccion" required value="{{$centro->direccion}}" class="form-control" placeholder="Direccion...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="departamento">Departamento</label>
					<input disabled type="text" name="departamento" required value="{{$centro->departamento}}" class="form-control" placeholder="Departamento...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="ciudad">Ciudad</label>
					<input disabled type="text" name="ciudad" required value="{{$centro->ciudad}}" class="form-control" placeholder="Ciudad...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="telefono1">Telefono 1</label>
					<input disabled type="text" name="telefono1" required value="{{$centro->telefono1}}" class="form-control" placeholder="Telefono 1...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="telefono2">Telefono 2</label>
					<input disabled type="text" name="telefono2" required value="{{$centro->telefono2}}" class="form-control" placeholder="Telefono 2...">
				</div>
			</div>

    </div>

@endsection

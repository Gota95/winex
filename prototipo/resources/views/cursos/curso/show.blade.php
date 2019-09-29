@extends('layouts.admin')
@section('contenido')

	  <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="codigo">Codigo</label>
					<input disabled type="text" name="codigo" required value="{{$curso->codigo}}" class="form-control" placeholder="Codigo...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="curso">Curso</label>
					<input disabled type="text" name="curso" required value="{{$curso->curso}}" class="form-control" placeholder="Curso...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="descripcion">Descripcion</label>
					<input disabled type="text" name="descripcion" required value="{{$curso->descripcion}}" class="form-control" placeholder="Descripcion...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="estado">Estado</label>
					<input disabled type="text" name="estado" required value="{{$curso->estado}}" class="form-control" placeholder="estado...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="grado_id">Grado</label>
					<input disabled type="text" name="grado_id" required value="{{$curso->grado}}" class="form-control" placeholder="Grado...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="personal_id">Personal</label>
					<input disabled type="text" name="personal_id" required value="{{$curso->nombre_personal.' '.$curso->apellido_personal}}" class="form-control" placeholder="Personal...">
				</div>
			</div>


    </div>

@endsection

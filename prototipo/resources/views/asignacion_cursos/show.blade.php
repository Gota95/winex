@extends('layouts.admin')
@section('contenido')

	  <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="fecha_asignacion">Fecha de Asignacion</label>
					<input type="date" name="fecha_asignacion" value="{{$asignacion->fecha_asignacion}}" class="form-control">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="estudiante_id">Estudiante</label>
					<input type="text" name="estudiante_id" required value="{{$asignacion->nombre_estudiante.' '.$asignacion->apellido_estudiante}}" class="form-control" placeholder="Estudiante...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="ciclo_id">Ciclo</label>
					<input type="text" name="ciclo_id" required value="{{$asignacion->fecha_inicio.' '.$asignacion->fecha_fin}}" class="form-control" placeholder="Ciclo...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="seccion_id">Seccion</label>
					<input type="text" name="seccion_id" required value="{{$asignacion->seccion}}" class="form-control" placeholder="Seccion...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="grado_id">Grado</label>
					<input type="text" name="grado_id" required value="{{$asignacion->grado}}" class="form-control" placeholder="Grado...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="carrera_id">Carrera</label>
					<input type="text" name="carrera_id" required value="{{$asignacion->carrera}}" class="form-control" placeholder="Carrera...">
				</div>
			</div>



    </div>

@endsection

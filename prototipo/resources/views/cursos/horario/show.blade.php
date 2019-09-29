@extends('layouts.admin')
@section('contenido')

	  <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="hora_inicio">Hora de Inicio</label>
					<input disabled type="time" name="hora_inicio" required value="{{$horario->hora_inicio}}" class="form-control" placeholder="Horario de Inicio...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="hora_fin">Hora de Fin</label>
					<input disabled type="time" name="hora_fin" required value="{{$horario->hora_fin}}" class="form-control" placeholder="Horario de Fin...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="dia">Dia</label>
					<input disabled type="text" name="dia" required value="{{$horario->dia}}" class="form-control" placeholder="Dia...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="curso_id">Curso</label>
					<input disabled type="text" name="curso_id" required value="{{$horario->curso}}" class="form-control" placeholder="Curso...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="seccion_id">Seccion</label>
					<input disabled type="text" name="seccion_id" required value="{{$horario->seccion}}" class="form-control" placeholder="Seccion...">
				</div>
			</div>


    </div>

@endsection

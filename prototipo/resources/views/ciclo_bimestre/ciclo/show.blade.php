@extends('layouts.admin')
@section('contenido')

	  <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="fecha_inicio">Fecha de Inicio</label>
					<input disabled type="date" name="fecha_inicio" required value="{{$ciclo->fecha_inicio}}" class="form-control" placeholder="Fecha de Inicio...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="fecha_fin">Fecha de Fin</label>
					<input disabled type="date" name="fecha_fin" required value="{{$ciclo->fecha_fin}}" class="form-control" placeholder="Fecha de Fin...">
				</div>
			</div>


    </div>

@endsection

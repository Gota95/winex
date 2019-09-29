@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Ciclo: {{$ciclo->fecha_inicio.' '.$ciclo->fecha_fin}} </h3>
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

			{!!Form::model($ciclo,['method'=>'PATCH','route'=>['ciclo_bimestre.ciclo.update',$ciclo->id]])!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="fecha_inicio">Fecha de Inicio</label>
						<input type="date" name="fecha_inicio" required value="{{$ciclo->fecha_inicio}}" class="form-control" placeholder="Fecha de Inicio...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="fecha_fin">Fecha de Fin</label>
						<input type="date" name="fecha_fin" required value="{{$ciclo->fecha_fin}}" class="form-control" placeholder="Fecha de Fin...">
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

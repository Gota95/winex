@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Asignacion de Cursos <a href="asignacion_cursos/create"><button class="btn btn-success">Nuevo</button></h3></a>
		<br>
		@include('asignacion_cursos.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha de Asignacion</th>
					<th>Estudiante</th>
					<th>Ciclo</th>
					<th>Seccion</th>
					<th>Grado</th>
					<th>Carrera</th>
					<th>Opciones</th>
				</thead>

				@foreach($asignaciones as $asig)
					<tr>
						<td>{{$asig->fecha_asignacion}}</td>
						<td>{{$asig->nombre_estudiante.' '.$asig->apellido_estudiante}}</td>
						<td>{{$asig->fecha_inicio.' - '.$asig->fecha_fin}}</td>
						<td>{{$asig->seccion}}</td>
						<td>{{$asig->grado}}</td>
						<td>{{$asig->carrera}}</td>
						<td>
							<a href="{{URL::action('AsignacionesController@edit', $asig->id)}}">
								<button class="btn btn-info fa fa-edit"></button>
							</a>

							<a href="{{URL::action('AsignacionesController@show',$asig->id)}}">
								<button class="btn btn-primary fa fa-eye"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$asig->id}}" data-toggle="modal">
								<button class="btn btn-danger fa  fa-trash-o"></button>
							</a>
						</td>
					</tr>
					@include('asignacion_cursos.modal')
				@endforeach
			</table>
		</div>
		{{$asignaciones->render()}}
	</div>
</div>
@endsection

@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Horarios <a href="horario/create"><button class="btn btn-success">Nuevo</button></h3></a>
		<br>
		@include('cursos.horario.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Hora de Inicio</th>
					<th>Hora de Fin</th>
					<th>Dia</th>
					<th>Curso</th>
					<th>Seccion</th>
					<th>Opciones</th>
				</thead>

				@foreach($horarios as $hor)
					<tr>
						<td>{{$hor->hora_inicio}}</td>
						<td>{{$hor->hora_fin}}</td>
						<td>{{$hor->dia}}</td>
						<td>{{$hor->curso}}</td>
						<td>{{$hor->seccion}}</td>
						<td>
							<a href="{{URL::action('HorariosController@edit', $hor->id)}}">
								<button class="btn btn-info fa fa-edit"></button>
							</a>

							<a href="{{URL::action('HorariosController@show',$hor->id)}}">
								<button class="btn btn-primary fa fa-eye"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$hor->id}}" data-toggle="modal">
								<button class="btn btn-danger fa  fa-trash-o"></button>
							</a>
						</td>
					</tr>
					@include('cursos.horario.modal')
				@endforeach
			</table>
		</div>
		{{$horarios->render()}}
	</div>
</div>
@endsection

@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Estudiantes <a href="estudiantes/create"><button class="btn btn-success">Nuevo</button></h3></a>
		<br>
		@include('estudiantes_encargados.estudiantes.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Fecha de Nacimiento</th>
					<th>Foto</th>
					<th>Opciones</th>
				</thead>

				@foreach($estudiantes as $est)
					<tr>
						<td>{{$est->codigo}}</td>
						<td>{{$est->nombres.' '.$est->apellidos}}</td>
						<td>{{$est->fecha_nac}}</td>
						<td> <img src="{{asset('imagenes/estudiantes/'.$est->foto)}}" all="{{$est->nombres.' '.$est->apellidos}}" height="100px" width="100px"> </td>
						<td>
							<a href="{{URL::action('EstudiantesController@edit', $est->id)}}">
								<button class="btn btn-info fa fa-edit"></button>
							</a>

							<a href="{{URL::action('EstudiantesController@show',$est->id)}}">
								<button class="btn btn-primary fa fa-eye"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$est->id}}" data-toggle="modal">
								<button class="btn btn-danger fa  fa-trash-o"></button>
							</a>
						</td>
					</tr>
					@include('estudiantes_encargados.estudiantes.modal')
				@endforeach
			</table>
		</div>
		{{$estudiantes->render()}}
	</div>
</div>
@endsection

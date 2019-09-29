@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Encargados <a href="encargado/create"><button class="btn btn-success">Nuevo</button></h3></a>
		<br>
		@include('estudiantes_encargados.encargado.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Estudiante a su Cargo</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>Opciones</th>
				</thead>

				@foreach($encargados as $enc)
					<tr>
						<td>{{$enc->nombres.' '.$enc->apellidos}}</td>
						<td>{{$enc->nombre_estudiante.' '.$enc->apellido_estudiante}}</td>
						<td>{{$enc->direccion}}</td>
						<td>{{$enc->telefono}}</td>
						<td>
							<a href="{{URL::action('EncargadosController@edit', $enc->id)}}">
								<button class="btn btn-info fa fa-edit"></button>
							</a>

							<a href="{{URL::action('EncargadosController@show',$enc->id)}}">
								<button class="btn btn-primary fa fa-eye"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$enc->id}}" data-toggle="modal">
								<button class="btn btn-danger fa  fa-trash-o"></button>
							</a>
						</td>
					</tr>
					@include('estudiantes_encargados.encargado.modal')
				@endforeach
			</table>
		</div>
		{{$encargados->render()}}
	</div>
</div>
@endsection

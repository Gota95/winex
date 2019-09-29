@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Usuarios <a href="usuarios/create"><button class="btn btn-success">Nuevo</button></h3></a>
		<br>
		@include('usuarios.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Correo Electronico</th>
					<th>Rol</th>
					<th>Opciones</th>
				</thead>

				@foreach($usuarios as $usu)
				<tr>
					<td>{{$usu->name}}</td>
					<td>{{$usu->email}}</td>
					<td>{{$usu->rol}}</td>
					<td>
						<a href="{{URL::action('UsuariosController@edit',$usu->id)}}">
							<button class="btn btn-info">Editar</button>
						</a>

						<a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal">
							<button class="btn btn-danger">Eliminar</button>
						</a>
					</td>
				</tr>
				@include('usuarios.modal')
				@endforeach
			</table>
		</div>
		{{$usuarios->render()}}
	</div>
</div>
@endsection

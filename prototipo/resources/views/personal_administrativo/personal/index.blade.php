@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Personal <a href="personal/create"><button class="btn btn-success">Nuevo</button></h3></a>
		<br>
		@include('personal_administrativo.personal.search')
	</div>
	<br>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Inicio de Labores</th>
					<th>Foto</th>
					<th>Cargo</th>
					<th>Opciones</th>
				</thead>

				@foreach($personales as $per)
					<tr>
						<td>{{$per->nombres.' '.$per->apellidos}}</td>
						<td>{{$per->direccion}}</td>
						<td>{{$per->inicio_labores}}</td>
						<td><img src="{{asset('public/imagenes/personal/'.$per->foto)}}" all="{{$per->nombres.' '.$per->apellidos}}" height="100px" width="100px"></td>
						<td>{{$per->cargo}}</th>
						<td>
							<a href="{{URL::action('PersonalController@edit', $per->id)}}">
								<button class="btn btn-info fa fa-edit"></button>
							</a>

							<a href="{{URL::action('PersonalController@show',$per->id)}}">
								<button class="btn btn-primary fa fa-eye"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$per->id}}" data-toggle="modal">
								<button class="btn btn-danger fa  fa-trash-o"></button>
							</a>
						</td>
					</tr>
					@include('personal_administrativo.personal.modal')
				@endforeach
			</table>
		</div>
		{{$personales->render()}}
	</div>
</div>
@endsection

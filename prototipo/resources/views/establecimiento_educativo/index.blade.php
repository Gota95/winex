@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Centros <a href="establecimiento_educativo/create"><button class="btn btn-success">Nuevo</button></h3></a>
		<br>
		@include('establecimiento_educativo.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Logo</th>
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Ciudad</th>
					<th>Telefonos</th>
					<th>Opciones</th>
				</thead>

				@foreach($establecimientos as $est)
					<tr>
						<td><img src="{{asset('imagenes/logos/'.$est->logo)}}" all="{{$est->logo}}" height="100px" width="100px"></td>
						<td>{{$est->nombre}}</td>
						<td>{{$est->direccion}}</td>
						<td>{{$est->ciudad}}</td>
						<td>{{$est->telefono1.' / '.$est->telefono2}}</td>
						<td>
							<a href="{{URL::action('EstablecimientoController@edit', $est->id)}}">
								<button class="btn btn-info fa fa-edit"></button>
							</a>

							<a href="{{URL::action('EstablecimientoController@show',$est->id)}}">
								<button class="btn btn-primary fa fa-eye"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$est->id}}" data-toggle="modal">
								<button class="btn btn-danger fa  fa-trash-o"></button>
							</a>
						</td>
					</tr>
					@include('establecimiento_educativo.modal')
				@endforeach
			</table>
		</div>
		{{$establecimientos->render()}}
	</div>
</div>
@endsection

@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Carnet <a href="carnet/create"><button class="btn btn-success">Nuevo</button></a></h3>
		<br>
		@include('carnet.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>No. Carnet</th>
					<th>Nombre</th>
					<th>Foto</th>
					<th>Codigo QR</th>
					<th>Seccion</th>
					<th>Opciones</th>
				</thead>

				@foreach($carnet as $car)
					<tr>
						<td>{{$car->numerocarnet}}</td>
						<td>{{$car->est_nombres.' '.$car->est_apellidos}}</td>
						<td><img src="{{asset('imagenes/estudiantes/'.$car->foto)}}" height="100px" width="100px"></td>
						<td><img src="{{asset('imagenes/codigos_qr/'.$car->codigo_qr)}}" all="{{$car->numerocarnet}}" height="100px" width="100px"></td>
						<td>{{$car->seccion}}</td>
						<td>
							<a href="{{URL::action('CarnetController@edit', $car->id)}}">
								<button class="btn btn-info fa fa-edit"></button>
							</a>

							<a href="{{URL::action('CarnetController@show',$car->id)}}">
								<button class="btn btn-primary fa fa-eye"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$car->id}}" data-toggle="modal">
								<button class="btn btn-danger fa  fa-trash-o"></button>
							</a>

							<a href="{{URL::action('CarnetController@print',$car->id)}}">
								<button class="btn btn-primary fa fa-gg"></button>
							</a>
						</td>
					</tr>
					@include('carnet.modal')
				@endforeach
			</table>
		</div>
		{{$carnet->render()}}
	</div>
</div>
@endsection

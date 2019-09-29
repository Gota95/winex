@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Secciones <a href="seccion/create"><button class="btn btn-success">Nuevo</button></h3></a>
		<br>
		@include('carrera.seccion.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Opciones</th>
				</thead>

				@foreach($secciones as $sec)
					<tr>
						<td>{{$sec->seccion}}</td>
						<td>
							<a href="{{URL::action('SeccionesController@edit', $sec->id)}}">
								<button class="btn btn-info fa fa-edit"></button>
							</a>

							<a href="{{URL::action('SeccionesController@show',$sec->id)}}">
								<button class="btn btn-primary fa fa-eye"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$sec->id}}" data-toggle="modal">
								<button class="btn btn-danger fa  fa-trash-o"></button>
							</a>
						</td>
					</tr>
					@include('carrera.seccion.modal')
				@endforeach
			</table>
		</div>
		{{$secciones->render()}}
	</div>
</div>
@endsection

@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Generar Boletas de Notas <a href="estudiantes/create"></h3></a>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Boleta</th>
				</thead>

				@foreach($estudiantes as $est)
					<tr>
						<td>{{$est->nombres.' '.$est->apellidos}}</td>
						<td>
							<a href="{{URL::action('BoletasController@boletabi1', $est->id)}}">
								<button class="btn btn-info fa fa-edit"></button>
							</a>
						</td>
					</tr>

				@endforeach
			</table>
		</div>
		{{$estudiantes->render()}}
	</div>
</div>
@endsection

@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Evaluaciones <a href="tipo_evaluacion/create"><button class="btn btn-success">Nuevo</button></h3></a>
		<br>
		@include('notas.tipo_evaluacion.search')
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

				@foreach($tevaluaciones as $te)
					<tr>
						<td>{{$te->tipo}}</td>
						<td>
							<a href="{{URL::action('TipoEvaluacionController@edit', $te->id)}}">
								<button class="btn btn-info fa fa-edit"></button>
							</a>

							<a href="{{URL::action('TipoEvaluacionController@show',$te->id)}}">
								<button class="btn btn-primary fa fa-eye"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$te->id}}" data-toggle="modal">
								<button class="btn btn-danger fa  fa-trash-o"></button>
							</a>
						</td>
					</tr>
					@include('notas.tipo_evaluacion.modal')
				@endforeach
			</table>
		</div>
		{{$tevaluaciones->render()}}
	</div>
</div>
@endsection

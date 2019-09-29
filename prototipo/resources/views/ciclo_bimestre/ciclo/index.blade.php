@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Ciclos <a href="ciclo/create"><button class="btn btn-success">Nuevo</button></h3></a>
		<br>
		@include('ciclo_bimestre.ciclo.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha Inicio</th>
					<th>Fecha Fin</th>
					<th>Opciones</th>
				</thead>

				@foreach($ciclos as $ci)
					<tr>
						<td>{{$ci->fecha_inicio}}</td>
						<td>{{$ci->fecha_fin}}</td>
						<td>
							<a href="{{URL::action('CicloController@edit', $ci->id)}}">
								<button class="btn btn-info fa fa-edit"></button>
							</a>

							<a href="{{URL::action('CicloController@show',$ci->id)}}">
								<button class="btn btn-primary fa fa-eye"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$ci->id}}" data-toggle="modal">
								<button class="btn btn-danger fa  fa-trash-o"></button>
							</a>
						</td>
					</tr>
					@include('ciclo_bimestre.ciclo.modal')
				@endforeach
			</table>
		</div>
		{{$ciclos->render()}}
	</div>
</div>
@endsection

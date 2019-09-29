@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Aspectos de Notas <a href="aspecto/create"><button class="btn btn-success">Nuevo</button></h3></a>
		<br>
		@include('notas.aspecto.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Nota Minima</th>
					<th>Nota Maxima</th>
					<th>Opciones</th>
				</thead>

				@foreach($aspectos as $asp)
					<tr>
						<td>{{$asp->aspecto}}</td>
						<td>{{$asp->nota_minima}}</td>
						<td>{{$asp->nota_max}}</td>
						<td>
							<a href="{{URL::action('AspectosController@edit', $asp->id)}}">
								<button class="btn btn-info fa fa-edit"></button>
							</a>

							<a href="{{URL::action('AspectosController@show',$asp->id)}}">
								<button class="btn btn-primary fa fa-eye"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$asp->id}}" data-toggle="modal">
								<button class="btn btn-danger fa  fa-trash-o"></button>
							</a>
						</td>
					</tr>
					@include('notas.aspecto.modal')
				@endforeach
			</table>
		</div>
		{{$aspectos->render()}}
	</div>
</div>
@endsection

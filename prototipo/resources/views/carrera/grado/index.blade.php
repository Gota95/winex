@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Grados <a href="grado/create"><button class="btn btn-success">Nuevo</button></h3></a>
		<br>
		@include('carrera.grado.search')
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

				@foreach($grados as $gra)
					<tr>
						<td>{{$gra->grado}}</td>
						<td>
							<a href="{{URL::action('GradosController@edit', $gra->id)}}">
								<button class="btn btn-info fa fa-edit"></button>
							</a>

							<a href="{{URL::action('GradosController@show',$gra->id)}}">
								<button class="btn btn-primary fa fa-eye"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$gra->id}}" data-toggle="modal">
								<button class="btn btn-danger fa  fa-trash-o"></button>
							</a>
						</td>
					</tr>
					@include('carrera.grado.modal')
				@endforeach
			</table>
		</div>
		{{$grados->render()}}
	</div>
</div>
@endsection

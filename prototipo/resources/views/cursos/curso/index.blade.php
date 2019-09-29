@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Cursos <a href="curso/create"><button class="btn btn-success">Nuevo</button></h3></a>
		<br>
		@include('cursos.curso.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
					<th>Curso</th>
					<th>Grado</th>
					<th>Personal</th>
					<th>Opciones</th>
				</thead>

				@foreach($cursos as $cur)
					<tr>
						<td>{{$cur->codigo}}</td>
						<td>{{$cur->curso}}</td>
						<td>{{$cur->grado}}</td>
						<td>{{$cur->nombre_personal.' '.$cur->apellido_personal}}</td>
						<td>
							<a href="{{URL::action('CursosController@edit', $cur->id)}}">
								<button class="btn btn-info fa fa-edit"></button>
							</a>

							<a href="{{URL::action('CursosController@show',$cur->id)}}">
								<button class="btn btn-primary fa fa-eye"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$cur->id}}" data-toggle="modal">
								<button class="btn btn-danger fa  fa-trash-o"></button>
							</a>
						</td>
					</tr>
					@include('cursos.curso.modal')
				@endforeach
			</table>
		</div>
		{{$cursos->render()}}
	</div>
</div>
@endsection

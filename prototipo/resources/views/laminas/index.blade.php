@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Láminas <a href="laminas/create"><button class="btn btn-success">Nuevo</button></h3></a>
		<br>
		@include('laminas.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Lamina</th>
					<th>Descripción</th>
					<th>Categoria</th>
					<th>Opciones</th>
				</thead>

				@foreach($laminas as $lam)
					<tr>
						<td>{{$lam->nombre}}</td>
						<td>{{$lam->lamina}}</td>
						<td>{{$lam->descripcion}}</td>
						<td>{{$lam->categoria}}</td>
						<td>
							<a href="{{URL::action('LaminaController@edit', $lam->id)}}">
								<button class="btn btn-info fa fa-edit"></button>
							</a>

							<a href="{{URL::action('LaminaController@show',$lam->id)}}">
								<button class="btn btn-primary fa fa-eye"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$lam->id}}" data-toggle="modal">
								<button class="btn btn-danger fa  fa-trash-o"></button>
							</a>
						</td>
					</tr>
					@include('laminas.modal')
				@endforeach
			</table>
		</div>
		{{$laminas->render()}}
	</div>
</div>
@endsection

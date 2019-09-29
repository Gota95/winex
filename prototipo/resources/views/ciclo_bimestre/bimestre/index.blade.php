@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Bimestres <a href="bimestre/create"><button class="btn btn-success">Nuevo</button></h3></a>
		<br>
		@include('ciclo_bimestre.bimestre.search')
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

				@foreach($bimestres as $bi)
					<tr>
						<td>{{$bi->bimestre}}</td>
						<td>
							<a href="{{URL::action('BimestreController@edit', $bi->id)}}">
								<button class="btn btn-info fa fa-edit"></button>
							</a>

							<a href="{{URL::action('BimestreController@show',$bi->id)}}">
								<button class="btn btn-primary fa fa-eye"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$bi->id}}" data-toggle="modal">
								<button class="btn btn-danger fa  fa-trash-o"></button>
							</a>
						</td>
					</tr>
					@include('ciclo_bimestre.bimestre.modal')
				@endforeach
			</table>
		</div>
		{{$bimestres->render()}}
	</div>
</div>
@endsection

@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Mensajería <a href="telegram/create"><button class="btn btn-success">Nuevo</button></h3></a>
		<br>
		@include('telegram.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Mensaje</th>
					<th>Fecha</th>
					<th>Sección</th>
				</thead>

				@foreach($mensajeria as $msj)
					<tr>
						<td>{{$msj->Mensaje}}</td>
						<td>{{$msj->Fecha}}</td>
						<td>{{$msj->seccion}}</td>
						<td>
							<a href="{{URL::action('MensajeriaController@edit', $msj->IdMensajeria)}}">
								<button class="btn btn-info fa fa-edit"></button>
							</a>

							<a href="{{URL::action('MensajeriaController@show',$msj->IdMensajeria)}}">
								<button class="btn btn-primary fa fa-eye"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$msj->IdMensajeria}}" data-toggle="modal">
								<button class="btn btn-danger fa  fa-trash-o"></button>
							</a>
						</td>
					</tr>
					@include('telegram.modal')
				@endforeach
			</table>
		</div>
		{{$mensajeria->render()}}
	</div>
</div>
@endsection

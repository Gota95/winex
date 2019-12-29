@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Actividad Cursos<a href="actividad/create"><button class="btn btn-success">Nuevo</button></h3></a>
		<br>
		{{-- @include('cursos.curso.search') --}}
	</div>

</div>
<div class="container">
		<div class="row">
			@if (\Session::has('success'))
				{
					<div class="alert alert-success">
						<p>{{ \Session::get('success') }}</p>
					</div>
				}
			@endif

			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading" style="background: #2e6da4; color: white;">
					</div>
					<div class="panel-body">
					{!! $calendar->calendar() !!}
			    {!! $calendar->script() !!}
					</div>
				</div>
			</div>
		</div>
</div>
@endsection
<script>
</script>

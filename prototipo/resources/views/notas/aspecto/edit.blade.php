@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Aspecto: {{$aspecto->aspecto}}</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

			{!!Form::model($aspecto,['method'=>'PATCH','route'=>['aspecto.update',$aspecto->id]])!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="aspecto">Aspecto</label>
						<input type="text" name="aspecto" required value="{{$aspecto->aspecto}}" class="form-control" placeholder="Aspecto...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nota_minima">Nota Minima</label>
							<input type="number" name="nota_minima" required value="{{$aspecto->nota_minima}}" class="form-control" step="0.01" min="0">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nota_maxima">Nota Maxima</label>
							<input type="number" name="nota_max" required value="{{$aspecto->nota_max}}" class="form-control" step="0.01" min="0">
					</div>
				</div>
			</div>



			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection

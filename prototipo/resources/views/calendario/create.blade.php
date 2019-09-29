@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Actividad Escolar</h3>
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

			{!!Form::open(array('url'=>'calendario/','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}}

			<div class="row">

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="establecimiento_id">Establecimiento </label>
						<select data-live-search="true" name="establecimiento_id" id="establecimiento_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($establecimientos as $est)
								<option value="{{$est->id}}">{{$est->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="Actividad">Nombre de la Actividad</label>
						<input type="text" name="Actividad" required value="{{old('Actividad')}}" class="form-control" placeholder="Nombre de la Actividad...">
					</div>
				</div>


				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="Fecha_inicio">Fecha de Inicio</label>
						<input type="date" title="Fecha en que culmina la actividad" name="Fecha_inicio" required value="{{old('Fecha_inicio')}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="Fecha_fin">Fecha Final</label>
						<input type="date" title="Fecha en que culmina la actividad" name="Fecha_fin" required value="{{old('Fecha_fin')}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="Descripcion">Detalle de la Actividad</label>
						<input type="text" name="Descripcion" required value="{{old('Descripcion')}}" class="form-control" placeholder="Describir la actividad">
					</div>
				</div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="Color">Color</label>
						<input type="color" name="Color" required value="{{old('Color')}}" class="form-control">
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

@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Calendario Escolar: {{$establecimiento->actividad}}</h3>
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

			{!!Form::model($calendario,['method'=>'PATCH','route'=>['establecimiento_educativo.actividad.update',$actividad->IdCalendario]])!!}
			{{Form::token()}}
			<div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="curso_id">Grado </label>
						<select data-live-search="true" name="curso_id" id="curso_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($cursos as $cur)
								<option value="{{$cur->id}}">{{$cur->curso}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="Nombre_Actividad">Nombre de la Actividad</label>
						<input type="text" name="Nombre_Actividad" required value="{{old('Nombre_Actividad')}}" class="form-control" placeholder="Nombre de la Actividad...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="Detalle">Detalle de la Actividad</label>
						<input type="text" name="Detalle" required value="{{old('Detalle')}}" class="form-control" placeholder="Describir la actividad">
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
						<label for="Color">Color</label>
						<input type="color" name="Color" required value="{{old('Color')}}" class="form-control">
					</div>
				</div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="Punteo">Punteo</label>
						<input type="Punteo" name="Punteo" required value="{{old('Punteo')}}" class="form-control">
					</div>
				</div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="Observaciones">Observaciones</label>
						<input type="textarea" name="Observaciones" required value="{{old('Observaciones')}}" class="form-control">
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

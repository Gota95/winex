@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Horario</h3>
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

			{!!Form::open(array('url'=>'cursos/horario/','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}}

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="hora_inicio">Hora de Inicio</label>
						<input type="time" name="hora_inicio" required value="{{old('hora_inicio')}}" class="form-control" placeholder="Horario de Inicio...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="hora_fin">Hora de Fin</label>
						<input type="time" name="hora_fin" required value="{{old('hora_fin')}}" class="form-control" placeholder="Horario de Fin...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="dia">Dia</label>
						<input type="text" name="dia" required value="{{old('dia')}}" class="form-control" placeholder="Dia...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="curso_id">Curso </label>
						<select data-live-search="true" name="curso_id" id="curso_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($cursos as $cur)
								<option value="{{$cur->id}}">{{$cur->curso}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="seccion_id">Seccion </label>
						<select data-live-search="true" name="seccion_id" id="seccion_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($secciones as $sec)
								<option value="{{$sec->id}}">{{$sec->seccion}}</option>
							@endforeach
						</select>
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

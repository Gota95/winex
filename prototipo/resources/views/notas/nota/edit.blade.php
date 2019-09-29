@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Nota de: {{$nota->nombre_estudiante.' '.$nota->apellido_estudiante}}</h3>
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

			{!!Form::model($nota,['method'=>'PATCH','route'=>['nota.update',$nota->id]])!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nota">Nota</label>
							<input type="number" name="nota" required value="{{$nota->nota}}" class="form-control" step="0.01" min="0">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="estudiante_id">Estudiante </label>
						<select data-live-search="true" name="estudiante_id" id="estudiante_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($estudiantes as $est)
								<option value="{{$est->id}}">{{$est->nombres.' '.$est->apellidos}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
					<label for="bimestre_id">Numero de Unidad </label>
						<select data-live-search="true" name="bimestre_id" id="bimestre_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($bimestres as $bi)
								<option value="{{$bi->id}}">{{$bi->bimestre}}</option>
							@endforeach
						</select>
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
						<label for="aspecto_id">Aspecto </label>
						<select data-live-search="true" name="aspecto_id" id="aspecto_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($aspectos as $asp)
								<option value="{{$asp->id}}">{{$asp->aspecto}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="tipo_evaluacion_id">Tipo de Evaluacion </label>
						<select data-live-search="true" name="tipo_evaluacion_id" id="tipo_evaluacion_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($tevaluaciones as $te)
								<option value="{{$te->id}}">{{$te->tipo}}</option>
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

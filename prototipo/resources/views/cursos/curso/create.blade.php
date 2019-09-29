@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Curso</h3>
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

			{!!Form::open(array('url'=>'cursos/curso/','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}}

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="codigo">Codigo</label>
						<input type="text" name="codigo" required value="{{old('codigo')}}" class="form-control" placeholder="Codigo...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="curso">Curso</label>
						<input type="text" name="curso" required value="{{old('curso')}}" class="form-control" placeholder="Curso...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="descripcion">Descripcion</label>
						<input type="text" name="descripcion" required value="{{old('descripcion')}}" class="form-control" placeholder="Descripcion...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="estado">Estado</label>
						<input type="text" name="estado" required value="{{old('estado')}}" class="form-control" placeholder="estado...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="grado_id">Grado </label>
						<select data-live-search="true" name="grado_id" id="grado_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($grados as $gra)
								<option value="{{$gra->id}}">{{$gra->grado}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="personal_id">Personal </label>
						<select data-live-search="true" name="personal_id" id="personal_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($personales as $per)
								<option value="{{$per->id}}">{{$per->nombres.' '.$per->apellidos}}</option>
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

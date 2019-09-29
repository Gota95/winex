@extends('layouts.admin')
@section('contenido')

	  <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="carrera">Carrera</label>
					<input disabled type="text" name="carrera" required value="{{$carrera->carrera}}" class="form-control" placeholder="Carrera...">
				</div>
			</div>

    </div>

@endsection

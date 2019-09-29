@extends('layouts.admin')
@section('contenido')

	  <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="jornada">Jornada</label>
					<input disabled type="text" name="jornada" required value="{{$jornada->jornada}}" class="form-control" placeholder="Jornada...">
				</div>
			</div>

    </div>

@endsection

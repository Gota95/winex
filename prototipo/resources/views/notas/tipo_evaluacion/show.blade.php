@extends('layouts.admin')
@section('contenido')

	  <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="tipo">Tipo de Evaluacion</label>
					<input disabled type="text" name="tipo" required value="{{$tevaluacion->tipo}}" class="form-control" placeholder="Tipo de Evaluacion...">
				</div>
      </div>

    </div>

@endsection

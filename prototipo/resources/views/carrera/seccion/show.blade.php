@extends('layouts.admin')
@section('contenido')

	  <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="seccion">Seccion</label>
					<input disabled type="text" name="seccion" required value="{{$seccion->seccion}}" class="form-control" placeholder="seccion...">
				</div>
			</div>

    </div>

@endsection

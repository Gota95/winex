@extends('layouts.admin')
@section('contenido')

	  <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="grado">Grado</label>
					<input disabled type="text" name="grado" required value="{{$grado->grado}}" class="form-control" placeholder="Grado...">
				</div>
			</div>

    </div>

@endsection

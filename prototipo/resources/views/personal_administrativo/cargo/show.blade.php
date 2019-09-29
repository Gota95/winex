@extends('layouts.admin')
@section('contenido')

	  <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="cargo">Cargo</label>
					<input type="text" name="cargo" required value="{{$cargo->cargo}}" class="form-control" placeholder="Cargo...">
				</div>
			</div>

    </div>

@endsection

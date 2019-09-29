@extends('layouts.admin')
@section('contenido')

	  <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="bimestre">Bimestre</label>
					<input disabled type="text" name="bimestre" required value="{{$bimestre->bimestre}}" class="form-control" placeholder="Bimestre...">
				</div>
			</div>

    </div>

@endsection

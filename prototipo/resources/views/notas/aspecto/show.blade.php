@extends('layouts.admin')
@section('contenido')

	  <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="aspecto">Aspecto</label>
					<input disabled type="text" name="aspecto" required value="{{$aspecto->aspecto}}" class="form-control" placeholder="Aspecto...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="nota_minima">Nota Minima</label>
						<input disabled type="number" name="nota_minima" required value="{{$aspecto->nota_minima}}" class="form-control" step="0.01" min="0">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="nota_maxima">Nota Maxima</label>
						<input disabled type="number" name="nota_max" required value="{{$aspecto->nota_max}}" class="form-control" step="0.01" min="0">
				</div>
			</div>

    </div>

@endsection

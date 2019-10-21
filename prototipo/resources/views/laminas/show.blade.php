@extends('layouts.admin')
@section('contenido')

	  <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
            <embed src="{{asset('anexos/'.$lamina->lamina)}}" type="application/pdf" width="900px" height="500px" />
				</div>
			</div>
		</div>

@endsection

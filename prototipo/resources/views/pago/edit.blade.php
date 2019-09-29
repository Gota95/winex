@extends("layout.admin")
@section('contenido')

  <div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Carnet: {{$carnet->carnet}}</h3>
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

			{!!Form::model($carnet,['method'=>'PATCH','route'=>['carnet.update',$carnet->id]])!!}
			{{Form::token()}}
      
      {!!Form::close()!!}
    @endsection

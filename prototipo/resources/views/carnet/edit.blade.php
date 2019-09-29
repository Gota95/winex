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

<div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="grado">Grado</label>
            <input type="text" name="grado" value="{{old('grado')}}" class="form-control">
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="seccion">Sección</label>
            <input type="text" name="seccion" value="{{old('seccion')}}" class="form-control">
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="carnte">No. Carnet</label>
            <input type="text" name="carnet" value="{{old('carnet')}}" class="form-control">
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="nombres">Nombre</label>
            <input type="text" name="nombres" value="{{old('nombres')}}" class="form-control">
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="apellidos">Apellido</label>
            <input type="text" name="apellidos" value="{{old('apellidos')}}" class="form-control">
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" class="form-control">
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="codigo_qr">Codigo QR</label>
            <input type="file" name="codigo_qr" class="form-control">
          </div>
        </div>
</div>
      <div class="form-group">
        <button class="btn btn-primary" type="submit">Generar</button>
        <button class="btn btn-danger" type="reset">Cancelar</button>
      </div>
      {!!Form::close()!!}
@endsection

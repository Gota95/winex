@extends('layouts.admin')
@section('contenido')

	  <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="Genero">Genero</label>
          <input disabled  type="text" name="genero" required value="{{$genero->genero}}" class="form-control" placeholder="Genero...">
        </div>
      </div>

    </div>

@endsection

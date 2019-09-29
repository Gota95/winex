@extends('layouts.admin')
@section('contenido')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Editar Curso: {{$curso->curso}}</h3>
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

      {!!Form::model($curso,['method'=>'PATCH','route'=>['cursos.curso.update',$curso->id]])!!}
      {{Form::token()}}
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="dirigir">Dirigir a:</label>
            <select data-live-search="true" name="dirigir" id="dirigir" class="form-control selectpicker">
            </select>
          </div>
        </div>

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
            <label for="Mensaje">Mensaje</label>
            <textarea type="textarea" name="mensaje" class="form-control" placeholder="Descripcion..."></textarea>
          </div>
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">Enviar</button>
        <button class="btn btn-danger" type="reset">Cancelar</button>
      </div>
      {!!Form::close()!!}
    @endsection

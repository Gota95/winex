
@extends('layouts.admin')
@section('contenido')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Editar Asistencia: {{$asistencia->asistencia}}</h3>
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

      {!!Form::model($asistencia,['method'=>'PATCH','route'=>['asistencia.update',$asistencia->IdAsistencia]])!!}
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
            <label for="Fecha">Fecha de Asistencia</label>
            <input type="date" name="Fecha" value="{{old('Fecha')}}" class="form-control">
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="Hora">Hora de Asistencia</label>
            <input type="time" name="Hora" value="{{old('Hora')}}" class="form-control">
          </div>
        </div>
      </div>
      <div class="form-group">
        <button class="btn btn-primary" type="submit">Guardar</button>
        <button class="btn btn-danger" type="reset">Cancelar</button>
      </div>
    
      {!!Form::close()!!}
  @endsection
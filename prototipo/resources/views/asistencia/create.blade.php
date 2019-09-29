@extends('layouts.admin')
@section('contenido')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Asistencia</h3>
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

{!!Form::open(array('url'=>'asistencia/','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
      {{Form::token()}}

<div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="estudiante_id">Estudiante </label>
            <select data-live-search="true" name="estudiante_id" id="estudiante_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
              @foreach($estudiantes as $est)
                <option value="{{$est->id}}">{{$est->nombres.' '.$est->apellidos}}</option>
              @endforeach
            </select>
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

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="Presente">Asistencia</label>
            <input type="text" name="Presente" value="{{old('Presente')}}" class="form-control">
          </div>
        </div>

</div>

      <div class="form-group">
        <button class="btn btn-primary" type="submit">Guardar</button>
        <button class="btn btn-danger" type="reset">Cancelar</button>
      </div>
      {!!Form::close()!!}
@endsection
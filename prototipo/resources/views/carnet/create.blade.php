@extends('layouts.admin')
@section('contenido')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Nuevo Carnet</h3>
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

      {!!Form::open(array('url'=>'carnet/','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
      {{Form::token()}}

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="numerocarnet">No. Carnet</label>
            <input type="text" name="numerocarnet" value="{{old('numerocarnet')}}" class="form-control">
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="codigo_qr">Codigo QR</label>
            <input type="file" name="codigo_qr" value="{{old('codigo_qr')}}" class="form-control">
          </div>
        </div>

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
            <label for="seccion_id">Seccion</label>
            <select data-live-search="true" name="seccion_id" id="seccion_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
              @foreach($secciones as $sec)
                <option value="{{$sec->id}}">
                  {{$sec->seccion}}
                </option>
              @endforeach
            </select>
          </div>
        </div>

      </div>

      <div class="form-group">
        <button class="btn btn-primary" type="submit">Generar</button>
        <button class="btn btn-danger" type="reset">Cancelar</button>
      </div>
      {!!Form::close()!!}
@endsection

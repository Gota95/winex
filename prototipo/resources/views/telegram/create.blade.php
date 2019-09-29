@extends('layouts.admin')
@section('contenido')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Nuevo Mensaje</h3>
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

      {!!Form::open(array('url'=>'telegram/','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
      {{Form::token()}}

      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="dirigir">Nivel</label>
            <select data-live-search="true" name="dirigir" id="dirigir" class="form-control selectpicker"
            <script src="{{asset('js/bootstrap.min.js')}}"></script>>
            @foreach($carreras as $car)
            <option value="{{$car->id}}">{{$car->carrera}}</option>
            @endforeach
            </select>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="grado_id">Grado </label>
            <select data-live-search="true" name="grado_id" id="grado_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
              @foreach($grados as $gra)
                <option value="{{$gra->id}}">{{$gra->grado}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="seccion_id">Seccion</label>
            <select data-live-search="true" name="seccion_id" id="seccion_id" class="form-control selectpicker"
            <script src="{{asset('js/bootstrap.min.js')}}"></script>>
              @foreach($secciones as $sec)
                <option value="{{$sec->id}}">{{$sec->seccion}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="Fecha">Fecha de Envio</label>
            <input type="date" name="fecha" value="{{old('fecha')}}" class="form-control">
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

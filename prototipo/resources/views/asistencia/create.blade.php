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

{!!Form::open(array('url'=>'asistencia/list','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
      {{Form::token()}}

<div class="row">

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="form-group">
            <label for="idcarrera">Carrera </label>
            <select data-live-search="true" name="sidcarrera" id="sidcarrera" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
              @foreach($carreras as $c)
                <option value="{{$c->id}}">{{$c->carrera}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="form-group">
            <label for="idgrado">Grado </label>
            <select data-live-search="true" name="sidgrado" id="sidgrado" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
              @foreach($grados as $g)
                <option value="{{$g->id}}">{{$g->grado}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="form-group">
            <label for="idseccion">Sección </label>
            <select data-live-search="true" name="sidseccion" id="sidseccion" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
              @foreach($secciones as $sec)
                <option value="{{$sec->id}}">{{$sec->seccion}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <a href="/lista"><button class="btn btn-primary" type="submit"  id="bt_v">Ver</button></a>
        </div>

        {{-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <br>
          <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
              <th class="col-lg-2">Asistencia</th>
              <th>Alumno</th>
              <th>Opciones</th>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div> --}}

</div>
      {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">
      <div class="form-group">
        <input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
        <button class="btn btn-primary" type="submit">Guardar</button>
        <button class="btn btn-danger" type="reset">Cancelar</button>
      </div>
      </div> --}}
      {!!Form::close()!!}


@endsection

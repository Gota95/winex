@extends('layouts.admin')
@section('contenido')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Nuevo Pago</h3>
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

      {!!Form::open(array('url'=>'pago/','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
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

        <?php $fcha = date("Y-m-d");?>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="Fecha">Fecha de Pago</label>
            <input type="date" name="Fecha" value="<?php echo $fcha;?>" readonly class="form-control">
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="detalle_id">Descripción/Concepto</label>
            <select data-live-search="true" name="detalle_id" id="detalle_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
              @foreach($detalles as $det)
                <option value="{{$det->IdDetallePago}}">
                  {{$det->descripcion.' '.$det->monto}}
                </option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="Total">Total</label>
            <input type="text" name="Total" value="{{old('Total')}}" class="form-control">
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="Estado">Estado</label>
            <input type="text" name="Estado" value="{{old('Estado')}}" class="form-control">
          </div>
        </div>

      </div>

      <div class="form-group">
        <button class="btn btn-primary" type="submit">Generar</button>
        <button class="btn btn-danger" type="reset">Cancelar</button>
      </div>
      {!!Form::close()!!}
@endsection

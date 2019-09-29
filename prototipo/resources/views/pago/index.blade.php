@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Pagos<a href="pago/create"><button class="btn btn-success">Nuevo</button></h3></a>
		<br>
		@include('pago.search')
	</div>
</div>

 <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
          <th>Alumno</th>
          <th>Fecha Pago</th>
          <th>Descripción</th>
          <th>Monto</th>
          <th>Total</th>
          <th>Estado</th>
          <th>Opciones</th>
        </thead>

        @foreach($pagos as $pa)
          <tr>
            <td>{{$pa->est_nombres.''.$pa->est_apellidos}}</td>
            <td>{{$pa->Fecha}}</td>
            <td>{{$pa->det_descripcion}}</td>
            <td>{{$pa->det_monto}}</td>
            <td>{{$pa->Total}}</td>
            <td>{{$pa->Estado}}</td>
            <td>
              <a href="{{URL::action('PagoController@edit', $pa->IdPago)}}">
                <button class="btn btn-info fa fa-edit"></button>
              </a>

              <a href="{{URL::action('PagoController@show',$pa->IdPago)}}">
                <button class="btn btn-primary fa fa-eye"></button>
              </a>

              <a href="" data-target="#modal-delete-{{$pa->IdPago}}" data-toggle="modal">
                <button class="btn btn-danger fa  fa-trash-o"></button>
              </a>
            </td>
          </tr>
          @include('pago.modal')
        @endforeach
      </table>
    </div>
    {{$pagos->render()}}
  </div>
</div>
<script type="text/javascript">
  var $aist=$pastencias;
  if($aist->Presente==1)
  {
    checkbox=true;
  }
  else{
    checkbox=false;
  }
    $('#presente').checkbox();
</script>
@endsection

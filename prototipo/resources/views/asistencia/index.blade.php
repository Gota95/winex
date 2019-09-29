@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Asistencia<a href="asistencia/create"><button class="btn btn-success">Nuevo</button></h3></a>
		<br>
		@include('asistencia.search')
	</div>
</div>

 <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
          <th>Peresente</th>
          <th>Alumno</th>
          <th>Hora</th>
          <th>Fecha</th>
        </thead>

        @foreach($asistencias as $asi)
          <tr>
            <td><input id="presente" type="checkbox">{{$asi->Presente}}</td>
            <td>{{$asi->nombre_estudiante.''.$asi->apellido_estudiante}}</td>
            <td>{{$asi->Hora}}</td>
            <td>{{$asi->Fecha}}</td>
            <td>
              <a href="{{URL::action('AsistenciaController@edit', $asi->IdAsistencia)}}">
                <button class="btn btn-info fa fa-edit"></button>
              </a>

              <a href="" data-target="#modal-delete-{{$asi->IdAsistencia}}" data-toggle="modal">
                <button class="btn btn-danger fa  fa-trash-o"></button>
              </a>
            </td>
          </tr>
          @include('asistencia.modal')
        @endforeach
      </table>
    </div>
    {{$asistencias->render()}}
  </div>
</div>
<script type="text/javascript">
  var $aist=$asistencias;
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

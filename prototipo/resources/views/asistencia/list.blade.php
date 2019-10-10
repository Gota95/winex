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
      {{ Form::close() }}
    @endsection

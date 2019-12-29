@extends('layouts.admin')
@section('contenido')

	  <div class="row">
			@foreach($asistencia as $asist)
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="Fecha">Fecha de Asistencia</label>
          <input type="date" name="Fecha" id="factual" required value="{{ $asist->Fecha }}" readonly class="form-control">
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="Hora">Hora de Asistencia</label>
          <input type="time" name="Hora" required value="{{ $asist->Hora }}" readonly class="form-control">
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="Carrera">Carrera</label>
          <input type="text" name="Hora" required value="{{ $asist->carrera }}" readonly class="form-control">
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="Grado">Grado</label>
          <input type="text" name="Hora" required value="{{ $asist->grado }}" readonly class="form-control">
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="Seccion">Seccion</label>
          <input type="text" name="Hora" required value="{{ $asist->seccion }}" readonly class="form-control">
        </div>
      </div>
		@endforeach
    </div>

		<div class="row">
	   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	     <div class="table-responsive">
	       <table class="table table-striped table-bordered table-condensed table-hover">
	         <thead>
	 					 <th>Clave</th>
	 					 <th>Asistencia</th>
	           <th>Nombres</th>
	           <th>Apellidos</th>
	         </thead>
	<?php $cont=1 ?>
	         @foreach($detalle as $d)
	           <tr>
	            <td><?php echo $cont;?></td>
	 						<td>@if($d->presente==1)
								{{'Presente'}}
								@endif
								@if($d->presente!=1)
									{{'Ausente'}}
									@endif</td>
	 						<td>{{$d->nombre_estudiante}}</td>
	 						<td>{{$d->apellido_estudiante}}</td>
	           </tr>
						 <?php $cont=$cont+1;?>
	         @endforeach
	       </table>
	     </div>
	   </div>
	 </div>
@endsection

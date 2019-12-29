<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ventas</title>
    {{-- SE DEFINE EL ESTILO DEL FORMULARIO PARA LA VISTA AMIGABLE --}}
  <style>
  table{
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  td, th{
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }
  tr:nth-child(even){
    background-color: #dddddd;
  }
  </style>
</head>
<body>
  <img src="img/logo.png"  height="100" width="100">
  <SPAN style="position: absolute; top: 0 px; right:   150 px;"><b> Instituto Normal Mixto de Occidente "Justo Rufino Barrios"</b> </span>
  <SPAN style="position: absolute; top: 20 px; right:  250 px;"><b> Asistencia de Alumnos</b> </span>
  {{-- creamos la tabla con los diferentes campos de encabezado y el cuerpo que contiene los datos obtenidos anteriormente --}}
    <div class="row">
      @foreach($asistencia as $asi)
      <pre><b>Carrera:</b>{{ $asi->carrera }}          <b>Grado:</b> {{ $asi->grado }}          <b>Seccion:</b> {{ $asi->seccion }}</pre>
      <p>Fecha: {{ $asi->Fecha }}</p>
      <p>Hora: {{ $asi->Hora }}</p>
    @endforeach
    </div>
    <table>
      <tr>
        <th>Clave</th>
        <th>Asistencia</th>
        <th>Nombres</th>
        <th>Apellidos</th>
      </tr>
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
</body>
</html>

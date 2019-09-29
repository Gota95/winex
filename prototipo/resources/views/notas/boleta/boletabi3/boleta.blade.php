<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
          <title>Boleta de Notas: {{$datos->nombre_estudiante.' '.$datos->apellido_estudiante}} </title>
        <link href="styles.css" rel="stylesheet" type="text/css">


</head>
<body>
      <img src="img/logo.png"  height="100" width="100">
      <SPAN style="position: absolute; top: 0 px; right:   150 px;"><b> Instituto Normal Mixto de Occidente "Justo Rufino Barrios"</b> </span>
      <SPAN style="position: absolute; top: 20 px; right:  250 px;"><b> Boleta de Calificaciones</b> </span>
      <SPAN style="position: absolute; top: 40 px; right:   230 px;">  Correspondientes a la Tercera Unidad</span>

        <p>Estudiante: {{$datos->nombre_estudiante.' '.$datos->apellido_estudiante}} </p>
        <p>Grado: {{$datos->grado.' '.$datos->carrera.' '.$datos->seccion}} </p>
        <table >
  <thead>
  <tr>
      <th>Curso</th>
      <th>Nota</th>
    </tr>
    </thead>
    <tfoot>
    @foreach($notas as $no)
    {!!$bimestre = $no->bimestre!!}
    @if($bimestre == 'III')
      <tr>
        <td>{{$no->curso}}</td>
        <td> {{$no->nota}} </td>

      </tr>
  @endif
    @endforeach
  </tbody>
  </table>

<p>Observaciones: ____________________________________________________________________________________________ </p>
<p>____________________________________________________________________________________________ </p>
<p>____________________________________________________________________________________________ </p>


 </body>
 </html>

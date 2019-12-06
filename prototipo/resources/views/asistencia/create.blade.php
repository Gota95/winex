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
<div class="alert alert-warning">
  <spaan id="aler">

  </spaan>
</div>
<div class="row">
  <?php $fcha = date("Y-m-d");?>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="Fecha">Fecha de Asistencia</label>
              <input type="date" name="Fecha" id="factual" value="<?php echo $fcha;?>" readonly class="form-control">
            </div>
          </div>
  <?php $hra = date("H:m");?>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="Hora">Hora de Asistencia</label>
              <input type="time" name="Hora" value="<?php echo $hra;?>" readonly class="form-control">
            </div>
          </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="form-group">
            <label for="idcarrera">Carrera </label>
            <select data-live-search="true" name="idcarrera" id="idcarrera" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
              @foreach($carreras as $c)
                <option value="{{$c->id}}">{{$c->carrera}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="form-group">
            <label for="idgrado">Grado </label>
            <select data-live-search="true" name="idgrado" id="idgrado" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
              @foreach($grados as $g)
                <option value="{{$g->id}}">{{$g->grado}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="form-group">
            <label for="idseccion">Sección </label>
            <select data-live-search="true" name="idseccion" id="idseccion" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
              @foreach($secciones as $sec)
                <option value="{{$sec->id}}">{{$sec->seccion}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <button class="btn btn-primary" type="button" id="bt_v">Ver</button>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <br>
          <table id="detalles" class="table table-hover table-striped table-bordered table-condensed">
            <thead>
              <th class="col-lg-2">Asistencia</th>
              <th>Alumno</th>
              <th>Opciones</th>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>

</div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">
      <div class="form-group">
        <input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
        <button class="btn btn-primary" type="submit">Guardar</button>
        <button class="btn btn-danger" type="reset">Cancelar</button>
      </div>
      </div>
      {!!Form::close()!!}
      @push ('scripts')
          <script>
            $(document).ready(function(){
              $('#bt_v').click(function(){
                ver();
              });
            });
            var cont=0;
            function ver()
            {
              asig=@json($asignaciones);
              sis=@json($asistencias);
              idcarrera=$("#idcarrera").val();
              idgrado=$("#idgrado").val();
              idseccion=$("#idseccion").val();
              var registrado=false;
              f=$("#factual").val();
              sis.forEach(function(value,index)
              {
                if(value.Fecha==f && value.idcarrera==idcarrera&&value.idgrado==idgrado&&value.idseccion==idseccion)
                {
                  registrado=true;
                }

                console.log('Pretty Format:', value.Fecha);
              });

              if(registrado==true)
              {
                var aler= document.getElementById('aler');
                 aler.innerHTML="No puede registrar más de una asistencia en el Día, por sección";
              }
              else
              {

                document.getElementById('bt_v').setAttribute("disabled", true);
                document.getElementById('idcarrera').setAttribute("readonly", true);
                document.getElementById('idgrado').setAttribute("readonly", true);
                document.getElementById('idseccion').setAttribute("readonly", true);

                asig.forEach(function(value,index){
                if(value.carrera_id==idcarrera&&value.grado_id==idgrado&&value.seccion_id==idseccion){
                var fila='<tr class="selected" id="fila'+cont+'"><td><input type="button hidden" class="btn btn-success" id="pre'+cont+'" name="presente[]" value="P" onclick="estado('+cont+');"></td><td><input type="hidden" name="idalumno[]" value="'+value.estudiante_id+'">'+value.e_nombres+' '+value.e_apellidos+'</td><td>Permiso<input type="checkbox" name="permiso[]" value=""></td></tr>';
                 cont++;
                $('#detalles').append(fila);
                cont++;}
                });
              }
            }


            function estado(index){
              var valor=$('#pre'+ index).val();
              if(valor=="P")
              {
              $('#pre' + index).addClass("btn btn-danger");
              $('#pre'+index).val("A");
              }
              else if(valor=="A"){
                $('#pre' + index).removeClass("btn btn-danger");
                $('#pre' + index).addClass("btn btn-success");
                $('#pre'+index).val("P");
              }
              console.log('Pretty Format:', $('#fila'+ index).val());
            }

            function evaluar()
            {
              if(total>0)
              {
                $("#guardar").show();
              }
              else
              {
                $("#guardar").hide();
              }
            }
          </script>
        @endpush
@endsection

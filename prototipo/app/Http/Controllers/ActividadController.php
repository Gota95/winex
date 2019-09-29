<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Actividad;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ActividadFormRequest;

use Illuminate\Support\Facades\Input;
use DB;

class ActividadController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $actividades=Actividad::all();
    $actividadl=[];
    foreach ($actividades as $row)
    {
      //$enddate = $row->Fecha_fin."24:00:00;";
      $actividadl[]=\Calendar::event(
        $row->Nombre_Actividad,
        true,
        new \Datetime($row->Fecha_inicio),
        new \Datetime($row->Fecha_fin),
        $row->IdActividad,
        [
          'color' => $row->Color,
        ]
      );
    }
    $calendar = \Calendar::addEvents($actividadl);
    return view('cursos.actividad.index',["actividades"=>$actividades,"calendar"=>$calendar]);
  }

  public function create(){
    $cursos=DB::table('curso')->get();
    return view("cursos.actividad.create",["cursos"=>$cursos]);
  }

public function store(ActividadFormRequest $request /*Request $request*/){
    $actividad= new Actividad;
    $actividad->IdActividad = $request->get('IdActividad');
    $actividad->Nombre_Actividad = $request->get('Nombre_Actividad');
    $actividad->Detalle = $request->get('Detalle');
    $actividad->Fecha_inicio = $request->get('Fecha_inicio');
    $actividad->Fecha_fin = $request->get('Fecha_fin');
    $actividad->Color = $request->get('Color');
    $actividad->Punteo = $request->get('Punteo');
    $actividad->Observaciones = $request->get('Observaciones');
    $actividad->curso_id = $request->get('curso_id');

    $actividad->save();
    return Redirect::to('cursos/actividad/')->with('success', 'Events Added');;
  }

  public function show($id){
    return view("notas.aspecto.show",["actividad"=>Actividad::findOrFail($id)]);
  }

  public function edit($id){
    return view("notas.aspecto.edit",["actividad"=>Actividad::findOrFail($id)]);
  }

  public function update(ActividadFormRequest $request, $id){

    $actividad=Actividad::findOrFail($id);
    $actividad->idActividad = $request->get('idActividad');
    $actividad->Nombre_actividad = $request->get('Nombre_actividad');
    $actividad->detalle = $request->get('detalle');
    $actividad->fecha_inicio = $request->get('fecha_inicio');
    $actividad->fecha_fin = $request->get('fecha_fin');
    $actividad->punteo = $request->get('punteo');
    $actividad->observaciones = $request->get('observaciones');
    $actividad->curso_id = $request->get('curso_id');

    $actividad->update();

    return Redirect::to('notas/aspecto/');
  }

  public function destroy($id){
    $actividad= DB::table('actividad')->where('idActividad', '=',$id)->delete();
    return Redirect::to('notas/aspecto/');
  }
}

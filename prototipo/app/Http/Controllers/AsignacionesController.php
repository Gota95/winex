<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Asignaciones;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AsignacionesFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class AsignacionesController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $asignaciones=DB::table('asignacion as asig')
      ->join('estudiante as est', 'asig.estudiante_id','=','est.id')
      ->join('ciclo as ci', 'asig.ciclo_id','=','ci.id')
      ->join('grado as gra', 'asig.grado_id','=','gra.id')
      ->join('carrera1 as ca', 'asig.carrera_id','=','ca.id')
      ->join('seccion as sec', 'asig.seccion_id','=','sec.id')
      ->select('asig.id','asig.fecha_asignacion','asig.nuevo_reingreso',DB::raw("est.nombres as nombre_estudiante"),DB::raw("est.apellidos as apellido_estudiante"),DB::raw("sec.seccion as seccion"),DB::raw("gra.grado as grado"),DB::raw("ca.carrera as carrera"),DB::raw("ci.fecha_inicio as fecha_inicio"),DB::raw("ci.fecha_fin as fecha_fin"))
      ->where('asig.id','LIKE','%'.$query.'%')
      ->orderBy('asig.id','asc')
      ->paginate(7);

      return view('asignacion_cursos.index',["asignaciones"=>$asignaciones,"searchText"=>$query]);
    }
  }

  public function create(){
    $estudiantes=DB::table('estudiante')->get();
    $ciclos=DB::table('ciclo')->get();
    $secciones=DB::table('seccion')->get();
    $grados=DB::table('grado')->get();
    $carreras=DB::table('carrera1')->get();
    return view("asignacion_cursos.create",["estudiantes"=>$estudiantes,"ciclos"=>$ciclos,
    "secciones"=>$secciones,"grados"=>$grados,"carreras"=>$carreras]);
  }

  public function store(AsignacionesFormRequest $request /*Request $request*/){
    $asignacion= new Asignaciones;
    $asignacion->id = $request->get('id');
    $asignacion->fecha_asignacion = $request->get('fecha_asignacion');
    $asignacion->estudiante_id = $request->get('estudiante_id');
    $asignacion->ciclo_id = $request->get('ciclo_id');
    $asignacion->seccion_id = $request->get('seccion_id');
    $asignacion->grado_id = $request->get('grado_id');
    $asignacion->carrera_id = $request->get('carrera_id');

    $asignacion->save();
    return Redirect::to('asignacion_cursos/');
  }

  public function show($id){
    return view("asignacion_cursos.show",["asignacion"=>Asignaciones::findOrFail($id)]);
  }

  public function edit($id){
    $alumnos=DB::table('estudiante')->get();
    $ciclo=DB::table('ciclo')->get();
    $secciones=DB::table('seccion')->get();
    $grados=DB::table('grado')->get();
    $carreras=DB::table('carrera1')->get();
    return view("asignacion_cursos.edit",["asignacion"=>Asignaciones::findOrFail($id),
    'estudiantes'=>$alumnos,"ciclos"=>$ciclo,"secciones"=>$secciones,"grados"=>$grados,"carreras"=>$carreras]);
  }

  public function update(AsignacionesFormRequest $request, $id){

    $asignacion=Asignaciones::findOrFail($id);
    $asignacion->fecha_asignacion = $request->get('fecha_asignacion');
    $asignacion->estudiante_id = $request->get('estudiante_id');
    $asignacion->ciclo_id = $request->get('ciclo_id');
    $asignacion->seccion_id = $request->get('seccion_id');
    $asignacion->grado_id = $request->get('grado_id');
    $asignacion->carrera_id = $request->get('carrera_id');
    $asignacion->update();

    return Redirect::to('asignacion_cursos/');
  }

  public function destroy($id){
    $asignacion = DB::table('asignacion')->where('id', '=',$id)->delete();
    return Redirect::to('asignacion_cursos/');
  }
}

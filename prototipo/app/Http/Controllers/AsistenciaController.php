<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Asistencia;
use App\DetalleAsistencia;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AsistenciaFormRequest;
use Illuminate\Support\Facades\Input;
use DB;
use Response;
use Illuminate\Support\Collection;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

class AsistenciaController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $day=date("Y-m-d");
      $query= trim($request->get('searchText'));
      $asistencias=DB::table('asistencia as asi')
      ->join('carrera1 as c', 'asi.idcarrera','=','c.id')
      ->join('grado as g', 'asi.idgrado','=','g.id')
      ->join('seccion as s', 'asi.idseccion','=','s.id')
      ->select('asi.IdAsistencia','asi.Hora','asi.Fecha',DB::raw("g.grado as grado"),DB::raw("s.seccion as seccion"),DB::raw("c.carrera as carrera"))
      ->where('asi.Fecha','>=',$day)
      ->where('asi.Fecha','LIKE','%'.$query.'%')
      ->orderBy('asi.IdAsistencia','asc')
      ->paginate(7);

      return view('asistencia.index',["asistencias"=>$asistencias, "searchText"=>$query]);
    }
  }

  public function create(){
    $f=date("Y-m-d");
    $asistencias=DB::table('asistencia as asi')->where('asi.Fecha','=',$f)->get();
    $asignacion=DB::table('asignacion as a')
    ->join('estudiante as e','a.estudiante_id','=','e.id')
    ->join('carrera1 as c','a.carrera_id','c.id')
    ->join('grado as g','a.grado_id','g.id')
    ->join('seccion as s','a.seccion_id','s.id')
    ->select('a.id','a.estudiante_id','a.ciclo_id','a.carrera_id','a.grado_id','a.seccion_id',DB::raw('e.nombres as e_nombres'),DB::raw('e.apellidos as e_apellidos'))
    ->get();
    $carreras=DB::table('carrera1')->get();
    $grados=DB::table('grado')->get();
    $secciones=DB::table('seccion as s')
    ->select('s.id','s.grado_id','s.seccion')
    ->get();
    return view("asistencia.create",["carreras"=>$carreras,
    "grados"=>$grados,"secciones"=>$secciones,"asignaciones"=>$asignacion,"asistencias"=>$asistencias]);
  }

public function store(AsistenciaFormRequest $request){
  try {

    DB::beginTransaction();

    $asistencia= new Asistencia;
    $asistencia->fecha = $request->get('Fecha');
    $asistencia->hora = $request->get('Hora');
    $asistencia->idcarrera = $request->get('idcarrera');
    $asistencia->idgrado = $request->get('idgrado');
    $asistencia->idseccion = $request->get('idseccion');
    $asistencia->save();

    $idalumno=$request->get('idalumno');
    $idasistencia=$asistencia->IdAsistencia;
    $presente=$request->get('presente');

    $cont = 0;

    while($cont < count($idalumno))
    {
      $detalle=new DetalleAsistencia;
      $detalle->idasistencia = $asistencia->IdAsistencia;
      $detalle->idalumno=$idalumno[$cont];
      if($presente[$cont]=="P"){
      $detalle->presente=1;
      }
      else if($presente[$cont]=="A")
      {
        $detalle->presente=0;
      }
      $detalle->save();
      $cont=$cont+1;
    }
    DB::commit();
  } catch (\Exception $e) {
    DB::rollback();
  }

    return Redirect::to('asistencia/');
  }

  public function show($id){
    $detalle=DB::table('detalle_asistencia as da')
    ->join('estudiante as es','da.idalumno','=','es.id')
    ->select('da.idasistencia','da.presente',DB::raw('es.nombres as nombre_estudiante'),DB::raw('es.apellidos as apellido_estudiante'))
    ->where('da.idasistencia','=',$id)
    ->get();
    $asistencia=DB::table('asistencia as asis')
    ->join('carrera1 as c','asis.idcarrera','=','c.id')
    ->join('grado as g','asis.idgrado','=','g.id')
    ->join('seccion as s','asis.idseccion','=','s.id')
    ->select('asis.IdAsistencia','asis.Hora','asis.Fecha',DB::raw('c.carrera as carrera'),DB::raw('g.grado as grado'),
    DB::raw('s.seccion as seccion'))
    ->where('asis.IdAsistencia','=',$id)
    ->get();
    return view("asistencia.show",["asistencia"=>$asistencia,"detalle"=>$detalle]);
  }

  public function edit($id){
    return view("asistencia.edit",["asistencia"=>Asistencia::findOrFail($IdAsistencia)]);
  }

  public function update(AsistenciaFormRequest $request, $id){

    $asistencia=Asistencia::findOrFail($IdAsistencia);
    $asistencia->fecha = $request->get('Fecha');
    $asistencia->hora = $request->get('Hora');
    $asistencia->presente = $request->get('Presente');
    $asistencia->estudiante_id = $request->get('estudiante_id');
    $asistencia->update();

    return Redirect::to('asistencia/');
  }

  public function destroy($id){
    $asistencia= DB::table('asistencia')->where('IdAsistencia', '=',$id)->delete();
    return Redirect::to('asistencia/');
  }

  public function rasistencias($id){
    $detalle=DB::table('detalle_asistencia as da')
    ->join('estudiante as es','da.idalumno','=','es.id')
    ->select('da.idasistencia','da.presente',DB::raw('es.nombres as nombre_estudiante'),DB::raw('es.apellidos as apellido_estudiante'))
    ->where('da.idasistencia','=',$id)
    ->get();
    $asistencia=DB::table('asistencia as asis')
    ->join('carrera1 as c','asis.idcarrera','=','c.id')
    ->join('grado as g','asis.idgrado','=','g.id')
    ->join('seccion as s','asis.idseccion','=','s.id')
    ->select('asis.IdAsistencia','asis.Hora','asis.Fecha',DB::raw('c.carrera as carrera'),DB::raw('g.grado as grado'),
    DB::raw('s.seccion as seccion'))
    ->where('asis.IdAsistencia','=',$id)
    ->get();

    $view= \View::make('asistencia.reporte')->with('asistencia',$asistencia)->with('detalle',$detalle);
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    return $pdf->stream('asistencias'.'.pdf');
  }
}

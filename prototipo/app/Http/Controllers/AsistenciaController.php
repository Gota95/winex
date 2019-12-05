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
      $query= trim($request->get('searchText'));
      $asistencias=DB::table('asistencia as asi')
      ->join('carrera1 as c', 'asi.idcarrera','=','c.id')
      ->join('grado as g', 'asi.idgrado','=','g.id')
      ->join('seccion as s', 'asi.idseccion','=','s.id')
      ->select('asi.IdAsistencia','asi.Hora','asi.Fecha',DB::raw("g.grado as grado"),DB::raw("s.seccion as seccion"),DB::raw("c.carrera as carrera"))
      ->where('asi.Fecha','LIKE','%'.$query.'%')
      ->orderBy('asi.IdAsistencia','asc')
      ->paginate(7);

      return view('asistencia.index',["asistencias"=>$asistencias, "searchText"=>$query]);
    }
  }

  public function create(){
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
    "grados"=>$grados,"secciones"=>$secciones,"asignaciones"=>$asignacion]);
  }

public function store(AsistenciaFormRequest $request){
  try {

    DB::beginTransaction();

    $asistencia= new Asistencia;
    $asistencia->IdAsistencia=$request->get('IdAsistencia');
    $asistencia->fecha = $request->get('Fecha');
    $asistencia->hora = $request->get('Hora');
    $asistencia->idcarrera = $request->get('idcarrera');
    $asistencia->idgrado = $request->get('idgrado');
    $asistencia->idseccion = $request->get('idseccion');
    $asistencia->save();

    $idalumno=$request->get('idalumno');
    $idasistencia=$request->get('idasistencia');
    $presente=$request->get('presente');

    $cont = 0;

    while($cont < count($idalumno))
    {
      $detalle=new DetalleAsistencia;
      $detalle->idasistencia = $asistencia->IdAsistencia;
      $detalle->idalumno=$idalumno[$cont];
      $detalle->presente=$presente[$cont];
      if($presente == '0'){
        $text = "Nuevo mensaje del administrador\n"
        . "<b>Fecha de Envio: </b>\n"
        . "$asistencia->fecha\n"
        . "<b>Informacion: </b>\n"
        . "El estudiante con ID ". $asistencia->estudiante_id. " no se presento a la actividad del dia de hoy";

        Telegram::sendMessage([
          'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001413350349.0'),
          'parse_mode' => 'HTML',
          'text' => $text
        ]);
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
    return view("asistencia.show",["asistencia"=>Asistencia::findOrFail($IdAsistencia)]);
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Asistencia;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AsistenciaFormRequest;
use Illuminate\Support\Facades\Input;
use DB;
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
      ->join('estudiante as est', 'asi.estudiante_id','=','est.id')
      ->select('asi.IdAsistencia','asi.Hora','asi.Fecha','asi.Presente',DB::raw("est.nombres as nombre_estudiante"),DB::raw("est.apellidos as apellido_estudiante"))
      ->where('asi.Fecha','LIKE','%'.$query.'%')
      ->orderBy('asi.IdAsistencia','asc')
      ->paginate(7);

      return view('asistencia.index',["asistencias"=>$asistencias, "searchText"=>$query]);
    }
  }

  public function create(){
    $estudiantes=DB::table('estudiante')->get();
    return view("asistencia.create",["estudiantes"=>$estudiantes]);
  }

public function store(AsistenciaFormRequest $request /*Request $request*/){
    $asistencia= new Asistencia;
    $asistencia->idAsistencia = $request->get('IdAsistencia');
    $asistencia->fecha = $request->get('Fecha');
    $asistencia->hora = $request->get('Hora');
    $asistencia->presente = $request->get('Presente');
    $asistencia->estudiante_id = $request->get('estudiante_id');

    if($asistencia->presente == '0'){
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
    $asistencia->save();
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensajeria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\MensajeriaFormRequest;
use Illuminate\Support\Facades\Input;
use DB;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

class MensajeriaController extends Controller
{
	public function __construct(){
    $this->middleware('auth');
  	}

  	public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $mensajeria=DB::table('mensajeria as msj')
      ->join('seccion as sec', 'msj.seccion_id','=','sec.id')
      ->join('grado as gra', 'sec.grado_id','=','gra.id')
      ->select('msj.IdMensajeria','msj.Mensaje','msj.Fecha' ,DB::raw("sec.seccion as seccion"),DB::raw("gra.grado as grado"))
      ->where('msj.Fecha','LIKE','%'.$query.'%')
      ->orderBy('msj.IdMensajeria','asc')
      ->paginate(7);

      return view('telegram.index',["mensajeria"=>$mensajeria,"searchText"=>$query]);
    }
  	}

  	public function create(){
    $carreras=DB::table('carrera')->get();
    $secciones=DB::table('seccion')->get();
    $grados=DB::table('grado')->get();
    return view("telegram.create",["carreras"=>$carreras, "secciones"=>$secciones, "grados"=>$grados]);
  	}

  public function store(MensajeriaFormRequest $request /*Request $request*/){
    $mensaje= new Mensajeria;
    $mensaje->IdMensajeria = $request->get('IdMensajeria');
    $mensaje->mensaje = $request->get('mensaje');
    $mensaje->fecha = $request->get('fecha');
    $mensaje->seccion_id = $request->get('seccion_id');

		$text = "Nuevo mensaje del administrador\n"
				. "<b>Fecha de Envio: </b>\n"
				. "$mensaje->fecha\n"
				. "<b>Informacion: </b>\n"
				. $mensaje->mensaje;

		Telegram::sendMessage([
				'chat_id' => env('TELEGRAM_CHANNEL_ID', '960305286'),
				'parse_mode' => 'HTML',
				'text' => $text
		]);

    $mensaje->save();



    return Redirect::to('telegram/');
  }

  public function show($id){
    return view("telagram.show",["mensajeria"=>Mensajeria::findOrFail($IdMensajeria)]);
  }

   public function destroy($id){
    $mensajeria = DB::table('mensajeria')->where('IdMensajeria', '=',$IdMensajeria)->delete();
    return Redirect::to('telegram/');
  }
}

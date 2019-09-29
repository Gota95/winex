<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Horarios;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\HorariosFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class HorariosController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $horarios=DB::table('horario as hor')
      ->join('curso as cur', 'hor.curso_id','=','cur.id')
      ->join('seccion as sec', 'hor.seccion_id','=','sec.id')
      ->select('hor.id','hor.hora_inicio','hor.hora_fin','hor.dia',DB::raw("cur.curso as curso"),DB::raw("sec.seccion as seccion"))
      ->where('hor.id','LIKE','%'.$query.'%')
      ->orderBy('hor.id','asc')
      ->paginate(7);

      return view('cursos.horario.index',["horarios"=>$horarios,"searchText"=>$query]);
    }
  }

  public function create(){
    $cursos=DB::table('curso')->get();
    $secciones=DB::table('seccion')->get();
    return view("cursos.horario.create",["cursos"=>$cursos,"secciones"=>$secciones]);
  }

  public function store(HorariosFormRequest $request /*Request $request*/){
    $horario= new Horarios;
    $horario->id = $request->get('id');
    $horario->hora_inicio = $request->get('hora_inicio');
    $horario->hora_fin = $request->get('hora_fin');
    $horario->dia = $request->get('dia');
    $horario->curso_id = $request->get('curso_id');
    $horario->seccion_id = $request->get('seccion_id');

    $horario->save();
    return Redirect::to('cursos/horario/');
  }

  public function show($id){
    return view("cursos.horario.show",["horario"=>Horarios::findOrFail($id)]);
  }

  public function edit($id){
    return view("cursos.horario.edit",["horario"=>Horarios::findOrFail($id)]);
  }

  public function update(HorariosFormRequest $request, $id){

    $horario=Horarios::findOrFail($id);
    $horario->hora_inicio = $request->get('hora_inicio');
    $horario->hora_fin = $request->get('hora_fin');
    $horario->dia = $request->get('dia');
    $horario->curso_id = $request->get('curso_id');
    $horario->seccion_id = $request->get('seccion_id');
    $horario->update();

    return Redirect::to('cursos/horario/');
  }

  public function destroy($id){
    $horario = DB::table('horario')->where('id', '=',$id)->delete();
    return Redirect::to('cursos/horario/');
  }
}

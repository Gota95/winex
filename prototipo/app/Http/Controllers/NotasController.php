<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Notas;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\NotasFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class NotasController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $notas=DB::table('nota as no')
      ->join('aspecto as asp', 'no.aspecto_id','=','asp.id')
      ->join('estudiante as est', 'no.estudiante_id','=','est.id')
      ->join('curso as cur', 'no.curso_id','=','cur.id')
      ->join('tipo_evaluacion as te', 'no.tipo_evaluacion_id','=','te.id')
      ->join('bimestre as bi', 'no.bimestre_id','=','bi.id')
      ->select('no.id','no.nota',DB::raw("asp.aspecto as aspecto"),DB::raw("est.nombres as nombre_estudiante"),DB::raw("est.apellidos as apellido_estudiante"),DB::raw("cur.curso as curso"),DB::raw("te.tipo as tipo_evaluacion"),DB::raw("bi.bimestre as bimestre"))
      ->where('no.nota','LIKE','%'.$query.'%')
      ->orderBy('no.id','asc')
      ->paginate(7);

      return view('notas.nota.index',["notas"=>$notas,"searchText"=>$query]);
    }
  }

  public function create(){
    $aspectos=DB::table('aspecto')->get();
    $estudiantes=DB::table('estudiante')->get();
    $cursos=DB::table('curso')->get();
    $tevaluaciones=DB::table('tipo_evaluacion')->get();
    $bimestres=DB::table('bimestre')->get();
    return view("notas.nota.create",["aspectos"=>$aspectos,"estudiantes"=>$estudiantes,"cursos"=>$cursos,"tevaluaciones"=>$tevaluaciones,"bimestres"=>$bimestres]);
  }

public function store(NotasFormRequest $request /*Request $request*/){
    $nota= new Notas;
    $nota->id = $request->get('id');
    $nota->nota = $request->get('nota');
    $nota->aspecto_id = $request->get('aspecto_id');
    $nota->estudiante_id = $request->get('estudiante_id');
    $nota->curso_id = $request->get('curso_id');
    $nota->tipo_evaluacion_id = $request->get('tipo_evaluacion_id');
    $nota->bimestre_id = $request->get('bimestre_id');

    $nota->save();
    return Redirect::to('notas/nota/');
  }

  public function show($id){
    return view("notas.nota.show",["nota"=>Notas::findOrFail($id)]);
  }

  public function edit($id){
    $aspectos=DB::table('aspecto')->get();
    $estudiantes=DB::table('estudiante')->get();
    $cursos=DB::table('curso')->get();
    $tevaluaciones=DB::table('tipo_evaluacion')->get();
    $bimestres=DB::table('bimestre')->get();
    return view("notas.nota.edit",["nota"=>Notas::findOrFail($id),"aspectos"=>$aspectos,"estudiantes"=>$estudiantes,"cursos"=>$cursos,"tevaluaciones"=>$tevaluaciones,"bimestres"=>$bimestres]);
  }

  public function update(NotasFormRequest $request, $id){

    $nota=Notas::findOrFail($id);
    $nota->nota = $request->get('nota');
    $nota->aspecto_id = $request->get('aspecto_id');
    $nota->estudiante_id = $request->get('estudiante_id');
    $nota->curso_id = $request->get('curso_id');
    $nota->tipo_evaluacion_id = $request->get('tipo_evaluacion_id');
    $nota->bimestre_id = $request->get('bimestre_id');

    $nota->update();

    return Redirect::to('notas/nota/');
  }

  public function destroy($id){
    $nota = DB::table('nota')->where('id', '=',$id)->delete();
    return Redirect::to('notas/nota/');
  }
}

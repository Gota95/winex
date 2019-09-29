<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\TipoEvaluacion;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\TipoEvaluacionFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class TipoEvaluacionController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $tevaluaciones=DB::table('tipo_evaluacion as te')
      ->select('te.id','te.tipo')
      ->where('te.tipo','LIKE','%'.$query.'%')
      ->orderBy('te.id','asc')
      ->groupBy('te.id','te.tipo')
      ->paginate(7);

      return view('notas.tipo_evaluacion.index',["tevaluaciones"=>$tevaluaciones,"searchText"=>$query]);
    }
  }

  public function create(){
    return view("notas.tipo_evaluacion.create");
  }

public function store(TipoEvaluacionFormRequest $request /*Request $request*/){
    $tevaluacion= new TipoEvaluacion;
    $tevaluacion->id = $request->get('id');
    $tevaluacion->tipo = $request->get('tipo');


    $tevaluacion->save();
    return Redirect::to('notas/tipo_evaluacion/');
  }

  public function show($id){
    return view("notas.tipo_evaluacion.show",["tevaluacion"=>TipoEvaluacion::findOrFail($id)]);
  }

  public function edit($id){
    return view("notas.tipo_evaluacion.edit",["tevaluacion"=>TipoEvaluacion::findOrFail($id)]);
  }

  public function update(TipoEvaluacionFormRequest $request, $id){

    $tevaluacion=TipoEvaluacion::findOrFail($id);
    $tevaluacion->tipo = $request->get('tipo');
    $tevaluacion->update();

    return Redirect::to('notas/tipo_evaluacion/');
  }

  public function destroy($id){
    $tevaluacion = DB::table('tipo_evaluacion')->where('id', '=',$id)->delete();
    return Redirect::to('notas/tipo_evaluacion/');
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ciclo;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CicloFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class CicloController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $ciclos=DB::table('ciclo as ci')
      ->select('ci.id','ci.fecha_inicio','ci.fecha_fin')
      ->where('ci.id','LIKE','%'.$query.'%')
      ->orderBy('ci.id','asc')
      ->paginate(7);

      return view('ciclo_bimestre.ciclo.index',["ciclos"=>$ciclos,"searchText"=>$query]);
    }
  }

  public function create(){
    return view("ciclo_bimestre.ciclo.create");
  }

public function store(CicloFormRequest $request /*Request $request*/){
    $ciclo= new Ciclo;
    $ciclo->id = $request->get('id');
    $ciclo->fecha_inicio = $request->get('fecha_inicio');
    $ciclo->fecha_fin = $request->get('fecha_fin');
    $ciclo->estado = "1";

    $ciclo->save();
    return Redirect::to('ciclo_bimestre/ciclo/');
  }

  public function show($id){
    return view("ciclo_bimestre.ciclo.show",["ciclo"=>Ciclo::findOrFail($id)]);
  }

  public function edit($id){
    return view("ciclo_bimestre.ciclo.edit",["ciclo"=>Ciclo::findOrFail($id)]);
  }

  public function update(CicloFormRequest $request, $id){

    $ciclo=Ciclo::findOrFail($id);
    $ciclo->fecha_inicio = $request->get('fecha_inicio');
    $ciclo->fecha_fin = $request->get('fecha_fin');
    $ciclo->estado = "1";
    $ciclo->update();

    return Redirect::to('ciclo_bimestre/ciclo/');
  }

  public function destroy($id){
    $ciclo = DB::table('ciclo')->where('id', '=',$id)->delete();
    return Redirect::to('ciclo_bimestre/ciclo/');
  }
}

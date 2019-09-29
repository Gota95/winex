<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Grados;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\GradosFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class GradosController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $grados=DB::table('grado as gra')
      ->join('ciclo as ci', 'gra.ciclo_id','=','ci.id')
      ->join('jornada as jor', 'gra.jornada_id','=','jor.id')
      ->join('carrera1 as ca', 'gra.carrera_id','=','ca.id')
      ->select('gra.id','gra.grado',DB::raw("ci.fecha_inicio as fecha_inicio"),DB::raw("ci.fecha_fin as fecha_fin"),DB::raw("jor.jornada as jornada"),DB::raw("ca.carrera as carrera"))
      ->where('gra.grado','LIKE','%'.$query.'%')
      ->orderBy('gra.id','asc')
      ->paginate(7);

      return view('carrera.grado.index',["grados"=>$grados,"searchText"=>$query]);
    }
  }

  public function create(){
    $ciclos=DB::table('ciclo')->get();
    $jornadas=DB::table('jornada')->get();
    $carreras=DB::table('carrera1')->get();
    return view("carrera.grado.create",["ciclos"=>$ciclos,"carreras"=>$carreras,"jornadas"=>$jornadas]);
  }

public function store(GradosFormRequest $request /*Request $request*/){
    $grado= new Grados;
    $grado->id = $request->get('id');
    $grado->grado = $request->get('grado');
    $grado->ciclo_id = $request->get('ciclo_id');
    $grado->jornada_id = $request->get('jornada_id');
    $grado->carrera_id = $request->get('carrera_id');

    $grado->save();
    return Redirect::to('carrera/grado/');
  }

  public function show($id){
    return view("carrera.grado.show",["grado"=>Grados::findOrFail($id)]);
  }

  public function edit($id){
    $ciclos=DB::table('ciclo')->get();
    $jornadas=DB::table('jornada')->get();
    $carreras=DB::table('carrera1')->get();
    return view("carrera.grado.edit",["grado"=>Grados::findOrFail($id),"ciclos"=>$ciclos,"carreras"=>$carreras,"jornadas"=>$jornadas]);
  }

  public function update(GradosFormRequest $request, $id){

    $grado=Grados::findOrFail($id);
    $grado->grado = $request->get('grado');
    $grado->ciclo_id = $request->get('ciclo_id');
    $grado->jornada_id = $request->get('jornada_id');
    $grado->carrera_id = $request->get('carrera_id');

    $grado->update();

    return Redirect::to('carrera/grado/');
  }

  public function destroy($id){
    $grado = DB::table('grado')->where('id', '=',$id)->delete();
    return Redirect::to('carrera/grado/');
  }
}

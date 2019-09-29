<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Encargados;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EncargadosFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class EncargadosController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $encargados=DB::table('encargado as enc')
      ->join('estudiante as est', 'enc.estudiante_id','=','est.id')
      ->join('genero as gen', 'enc.genero_id','=','gen.id')
      ->select('enc.id','enc.nombres','enc.apellidos','enc.fecha_nac','enc.direccion','enc.telefono','enc.cui','enc.parentesco',DB::raw("est.nombres as nombre_estudiante"),DB::raw("est.apellidos as apellido_estudiante"),DB::raw("gen.genero as genero"))
      ->where('enc.nombres','LIKE','%'.$query.'%')
      ->orderBy('enc.id','asc')
      ->paginate(7);

      return view('estudiantes_encargados.encargado.index',["encargados"=>$encargados,"searchText"=>$query]);
    }
  }

  public function create(){
    $estudiantes=DB::table('estudiante')->get();
    $generos=DB::table('genero')->get();
    return view("estudiantes_encargados.encargado.create",["estudiantes"=>$estudiantes,"generos"=>$generos]);
  }

public function store(EncargadosFormRequest $request /*Request $request*/){
    $encargado= new Encargados;
    $encargado->id = $request->get('id');
    $encargado->nombres = $request->get('nombres');
    $encargado->apellidos = $request->get('apellidos');
    $encargado->fecha_nac = $request->get('fecha_nac');
    $encargado->direccion = $request->get('direccion');
    $encargado->telefono = $request->get('telefono');
    $encargado->cui = $request->get('cui');
    $encargado->parentesco = $request->get('parentesco');
    $encargado->genero_id = $request->get('genero_id');
    $encargado->estudiante_id = $request->get('estudiante_id');

    $encargado->save();
    return Redirect::to('estudiantes_encargados/encargado');
  }

  public function show($id){
    $encargado = DB::table('encargado as enc')
    ->join('estudiante as est', 'enc.estudiante_id','=','est.id')
    ->join('genero as gen', 'enc.genero_id','=','gen.id')
    ->select('enc.id','enc.nombres','enc.apellidos','enc.fecha_nac','enc.direccion','enc.telefono','enc.cui','enc.parentesco',DB::raw("est.nombres as nombre_estudiante"),DB::raw("est.apellidos as apellido_estudiante"),DB::raw("gen.genero as genero"))
    ->where('enc.id','=',$id)->first();
    return view("estudiantes_encargados.encargado.show",["encargado"=>Encargados::findOrFail($id)]);
  }

  public function edit($id){
    $estudiantes=DB::table('estudiante')->get();
    $generos=DB::table('genero')->get();
    return view("estudiantes_encargados.encargado.edit",["encargado"=>Encargados::findOrFail($id),"estudiantes"=>$estudiantes,"generos"=>$generos]);
  }

  public function update(EncargadosFormRequest $request, $id){

    $encargado=Encargados::findOrFail($id);
    $encargado->nombres = $request->get('nombres');
    $encargado->apellidos = $request->get('apellidos');
    $encargado->fecha_nac = $request->get('fecha_nac');
    $encargado->direccion = $request->get('direccion');
    $encargado->telefono = $request->get('telefono');
    $encargado->cui = $request->get('cui');
    $encargado->parentesco = $request->get('parentesco');
    $encargado->genero_id = $request->get('genero_id');
    $encargado->estudiante_id = $request->get('estudiante_id');
    $encargado->update();

    return Redirect::to('estudiantes_encargados/encargado');
  }

  public function destroy($id){
    $encargado = DB::table('encargado')->where('id', '=',$id)->delete();
    return Redirect::to('estudiantes_encargados/encargado');
  }
}

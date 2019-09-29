<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Secciones;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SeccionesFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class SeccionesController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $secciones=DB::table('seccion as sec')
      ->join('grado as gra', 'sec.grado_id','=','gra.id')
      ->select('sec.id','sec.seccion','sec.estado',DB::raw("gra.grado as grado"))
      ->where('sec.id','LIKE','%'.$query.'%')
      ->orderBy('sec.id','asc')
      ->paginate(7);

      return view('carrera.seccion.index',["secciones"=>$secciones,"searchText"=>$query]);
    }
  }

  public function create(){

    $grados=DB::table('grado')->get();
    return view("carrera.seccion.create",["grados"=>$grados]);
  }

public function store(SeccionesFormRequest $request /*Request $request*/){
    $seccion= new Secciones;
    $seccion->id = $request->get('id');
    $seccion->seccion = $request->get('seccion');
    $seccion->estado = $request->get('estado');
    $seccion->grado_id = $request->get('grado_id');

    $seccion->save();
    return Redirect::to('carrera/seccion/');
  }

  public function show($id){
    return view("carrera.seccion.show",["seccion"=>Secciones::findOrFail($id)]);
  }

  public function edit($id){
    $grados=DB::table('grado')->get();
    return view("carrera.seccion.edit",["seccion"=>Secciones::findOrFail($id),"grados"=>$grados]);
  }

  public function update(SeccionesFormRequest $request, $id){

    $seccion=Secciones::findOrFail($id);
    $seccion->seccion = $request->get('seccion');
    $seccion->estado = $request->get('estado');
    $seccion->grado_id = $request->get('grado_id');
    $seccion->update();

    return Redirect::to('carrera/seccion/');
  }

  public function destroy($id){
    $seccion = DB::table('seccion')->where('id', '=',$id)->delete();
    return Redirect::to('carrera/seccion/');
  }
}

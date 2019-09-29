<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Jornadas;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\JornadasFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class JornadasController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $jornadas=DB::table('jornada as jor')
      ->select('jor.id','jor.jornada','jor.estado')
      ->where('jor.jornada','LIKE','%'.$query.'%')
      ->orderBy('jor.id','asc')
      ->paginate(7);

      return view('carrera.jornada.index',["jornadas"=>$jornadas,"searchText"=>$query]);
    }
  }

  public function create(){
    return view("carrera.jornada.create");
  }

  public function store(JornadasFormRequest $request /*Request $request*/){
    $jornada= new Jornadas;
    $jornada->id = $request->get('id');
    $jornada->jornada = $request->get('jornada');
    $jornada->estado = "1";

    $jornada->save();
    return Redirect::to('carrera/jornada/');
  }

  public function show($id){
    return view("carrera.jornada.show",["jornada"=>Jornadas::findOrFail($id)]);
  }

  public function edit($id){
    return view("carrera.jornada.edit",["jornada"=>Jornadas::findOrFail($id)]);
  }

  public function update(JornadasFormRequest $request, $id){

    $jornada=Jornadas::findOrFail($id);
    $jornada->jornada = $request->get('jornada');
    $jornada->estado = "1";
    $jornada->update();

    return Redirect::to('carrera/jornada/');
  }

  public function destroy($id){
    $jornada = DB::table('jornada')->where('id', '=',$id)->delete();
    return Redirect::to('carrera/jornada/');
  }
}

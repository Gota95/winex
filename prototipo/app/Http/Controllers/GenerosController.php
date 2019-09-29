<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Generos;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\GenerosFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class GenerosController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $generos=DB::table('genero as gen')
      ->select('gen.id','gen.genero')
      ->where('gen.genero','LIKE','%'.$query.'%')
      ->orderBy('gen.id','asc')
      ->groupBy('gen.id','gen.genero')
      ->paginate(7);

      return view('estudiantes_encargados.genero.index',["generos"=>$generos,"searchText"=>$query]);
    }
  }

  public function create(){
    return view("estudiantes_encargados.genero.create");
  }

  public function store(GenerosFormRequest $request /*Request $request*/){
    $genero= new Generos;
    $genero->id = $request->get('id');
    $genero->genero = $request->get('genero');


    $genero->save();
    return Redirect::to('estudiantes_encargados/genero');
  }

  public function show($id){
    return view("estudiantes_encargados.genero.show",["genero"=>Generos::findOrFail($id)]);
  }

  public function edit($id){
    return view("estudiantes_encargados.genero.edit",["genero"=>Generos::findOrFail($id)]);
  }

  public function update(GenerosFormRequest $request, $id){

    $genero=Generos::findOrFail($id);
    $genero->genero = $request->get('genero');
    $genero->update();

    return Redirect::to('estudiantes_encargados/genero');
  }

  public function destroy($id){
    $genero = DB::table('genero')->where('id', '=',$id)->delete();
    return Redirect::to('estudiantes_encargados/genero');
  }
}

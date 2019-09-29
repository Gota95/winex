<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Aspectos;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AspectosFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class AspectosController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $aspectos=DB::table('aspecto as asp')
      ->select('asp.id','asp.aspecto','asp.nota_minima','asp.nota_max')
      ->where('asp.aspecto','LIKE','%'.$query.'%')
      ->orderBy('asp.id','asc')
      ->paginate(7);

      return view('notas.aspecto.index',["aspectos"=>$aspectos,"searchText"=>$query]);
    }
  }

  public function create(){
    return view("notas.aspecto.create");
  }

public function store(AspectosFormRequest $request /*Request $request*/){
    $aspecto= new Aspectos;
    $aspecto->id = $request->get('id');
    $aspecto->aspecto = $request->get('aspecto');
    $aspecto->nota_minima = $request->get('nota_minima');
    $aspecto->nota_max = $request->get('nota_max');

    $aspecto->save();
    return Redirect::to('notas/aspecto/');
  }

  public function show($id){
    return view("notas.aspecto.show",["aspecto"=>Aspectos::findOrFail($id)]);
  }

  public function edit($id){
    return view("notas.aspecto.edit",["aspecto"=>Aspectos::findOrFail($id)]);
  }

  public function update(AspectosFormRequest $request, $id){

    $aspecto=Aspectos::findOrFail($id);
    $aspecto->aspecto = $request->get('aspecto');
    $aspecto->nota_minima = $request->get('nota_minima');
    $aspecto->nota_max = $request->get('nota_max');
    $aspecto->update();

    return Redirect::to('notas/aspecto/');
  }

  public function destroy($id){
    $aspecto= DB::table('aspecto')->where('id', '=',$id)->delete();
    return Redirect::to('notas/aspecto/');
  }
}

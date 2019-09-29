<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cargos;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CargosFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class CargosController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $cargos=DB::table('cargo as car')
      ->select('car.id','car.cargo')
      ->where('car.cargo','LIKE','%'.$query.'%')
      ->orderBy('car.id','asc')
      ->groupBy('car.id','car.cargo')
      ->paginate(7);

      return view('personal_administrativo.cargo.index',["cargos"=>$cargos,"searchText"=>$query]);
    }
  }

  public function create(){
    return view("personal_administrativo.cargo.create");
  }

public function store(CargosFormRequest $request /*Request $request*/){
    $cargo= new Cargos;
    $cargo->id = $request->get('id');
    $cargo->cargo = $request->get('cargo');


    $cargo->save();
    return Redirect::to('personal_administrativo/cargo/');
  }

  public function show($id){
    return view("personal_administrativo.cargo.show",["cargo"=>Cargos::findOrFail($id)]);
  }

  public function edit($id){
    return view("personal_administrativo.cargo.edit",["cargo"=>Cargos::findOrFail($id)]);
  }

  public function update(CargosFormRequest $request, $id){

    $cargo=Cargos::findOrFail($id);
    $cargo->cargo = $request->get('cargo');
    $cargo->update();

    return Redirect::to('personal_administrativo/cargo/');
  }

  public function destroy($id){
    $cargo = DB::table('cargo')->where('id', '=',$id)->delete();
    return Redirect::to('personal_administrativo/cargo/');
  }
}

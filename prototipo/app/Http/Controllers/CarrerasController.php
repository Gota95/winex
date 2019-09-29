<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Carreras;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CarrerasFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class CarrerasController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $carreras=DB::table('carrera1 as car')
      ->select('car.id','car.carrera','car.estado')
      ->where('car.carrera','LIKE','%'.$query.'%')
      ->orderBy('car.id','asc')
      ->paginate(7);

      return view('carrera.carrera.index',["carreras"=>$carreras,"searchText"=>$query]);
    }
  }

  public function create(){
    return view("carrera.carrera.create");
  }

  public function store(CarrerasFormRequest $request /*Request $request*/){
    $carrera= new Carreras;
    $carrera->id = $request->get('id');
    $carrera->carrera = $request->get('carrera');
    $carrera->estado = "1";

    $carrera->save();
    return Redirect::to('carrera/carrera/');
  }

  public function show($id){
    return view("carrera.carrera.show",["carrera"=>Carreras::findOrFail($id)]);
  }

  public function edit($id){
    return view("carrera.carrera.edit",["carrera"=>Carreras::findOrFail($id)]);
  }

  public function update(CarrerasFormRequest $request, $id){

    $carrera=Carreras::findOrFail($id);
    $carrera->carrera = $request->get('carrera');
    $carrera->estado = "1";
    $carrera->update();

    return Redirect::to('carrera/carrera/');
  }

  public function destroy($id){
    $carrera = DB::table('carrera1')->where('id', '=',$id)->delete();
    return Redirect::to('carrera/carrera/');
  }
}

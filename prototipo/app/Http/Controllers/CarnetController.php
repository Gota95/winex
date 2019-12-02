<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Carnet;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CarnetFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class CarnetController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request)
  {
    if ($request) {
      $query= trim($request->get('searchText'));
      $carnet=DB::table('carnet as car')
      ->join('estudiante as est', 'car.estudiante_id','=','est.id')
      ->join('seccion as sec', 'car.seccion_id','=','sec.id')
      ->select('car.id','car.numerocarnet','car.codigo_qr',DB::raw('est.nombres as est_nombres'),DB::raw('est.apellidos as est_apellidos'),DB::raw('est.foto as foto'),
      DB::raw('sec.seccion as seccion'))
      ->where('car.numerocarnet','LIKE','%'.$query.'%')
      ->orderBy('car.id','asc')
      ->paginate(7);

      return view('carnet.index',["carnet"=>$carnet,"searchText"=>$query]);
    }
  }

  public function create(){
    $estudiantes=DB::table('estudiante')->get();
    $secciones=DB::table('seccion')->get();
    return view("carnet.create",["estudiantes"=>$estudiantes],["secciones"=>$secciones]);
  }

  public function store(CarnetFormRequest $request)
  {
    $carnet= new Carnet;
    $carnet->id=$request->get('id');
    $carnet->numerocarnet=$request->get('numerocarnet');

    if(Input::hasFile('codigo_qr')){
      $file=Input::file('codigo_qr');
      $file->move(public_path().'/imagenes/codigos_qr/',$file->getClientOriginalName());
      $carnet->codigo_qr=$file->getClientOriginalName();
    }

    $carnet->estudiante_id=$request->get('estudiante_id');
    $carnet->seccion_id=$request->get('seccion_id');

    $carnet->save();

    return Redirect::to('carnet/');
  }

  public function destroy($id)
  {
    $carnet= DB::table('carnet')->where('id','=',$id)->delete();
    return Redirect::to('carnet/');
  }

  public function show($id)
  {
      return view("carnet.generar",["carnet"=>Carnet::findOrFail($id)]);
  }
}

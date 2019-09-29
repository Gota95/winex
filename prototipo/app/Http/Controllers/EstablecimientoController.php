<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Establecimiento;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EstablecimientoFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class EstablecimientoController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $establecimientos=DB::table('establecimiento as est')
      ->select('est.id','est.nombre','est.direccion','est.departamento','est.ciudad','est.logo','est.telefono1','est.telefono2')
      ->where('est.nombre','LIKE','%'.$query.'%')
      ->orderBy('est.id','asc')
      ->groupBy('est.id','est.nombre','est.direccion','est.departamento','est.ciudad','est.logo','est.telefono1','est.telefono2')
      ->paginate(7);

      return view('establecimiento_educativo.index',["establecimientos"=>$establecimientos,"searchText"=>$query]);
    }
  }

  public function create(){
    return view("establecimiento_educativo.create");
  }

public function store(EstablecimientoFormRequest $request /*Request $request*/){
    $establecimiento= new Establecimiento;
    $establecimiento->id = $request->get('id');
    $establecimiento->nombre = $request->get('nombre');
    $establecimiento->direccion = $request->get('direccion');
    $establecimiento->departamento = $request->get('departamento');
    $establecimiento->ciudad	 = $request->get('ciudad');

    if(Input::hasFile('logo')){
      $file=Input::file('logo');
      $file->move(public_path().'/imagenes/logos/',$file->getClientOriginalName());
      $establecimiento->logo=$file->getClientOriginalName();
    }

    $establecimiento->telefono1 = $request->get('telefono1');
    $establecimiento->telefono2 = $request->get('telefono2');


    $establecimiento->save();
    return Redirect::to('establecimiento_educativo/');
  }

  public function show($id){
    return view("establecimiento_educativo.show",["establecimiento"=>establecimiento::findOrFail($id)]);
  }

  public function edit($id){
    return view("establecimiento_educativo.edit",["establecimiento"=>establecimiento::findOrFail($id)]);
  }

  public function update(EstablecimientoFormRequest $request, $id){

    $establecimiento=Establecimiento::findOrFail($id);
    $establecimiento->nombre = $request->get('nombre');
    $establecimiento->direccion = $request->get('direccion');
    $establecimiento->departamento = $request->get('departamento');
    $establecimiento->cuidad = $request->get('ciudad');
    $establecimiento->logo = $request->get('logo');
    $establecimiento->telefono1 = $request->get('telefono1');
    $establecimiento->telefono2 = $request->get('telefono2');
    $establecimiento->update();

    return Redirect::to('establecimiento_educativo/');
  }

  public function destroy($id){
    $establecimiento = DB::table('establecimiento')->where('id', '=',$id)->delete();
    return Redirect::to('establecimiento_educativo/');
  }
}

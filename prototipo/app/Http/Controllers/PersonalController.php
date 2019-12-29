<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Personal;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PersonalFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class PersonalController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $personales=DB::table('personal as per')
      ->join('cargo as car', 'per.cargo_id','=','car.id')
      ->join('users as usu', 'per.usuario_id','=','usu.id')
      ->join('genero as gen', 'per.genero_id','=','gen.id')
      ->select('per.id','per.nombres','per.apellidos','per.fecha_nac','per.lugar_nac','per.estado_civil',
      'per.direccion','per.inicio_labores','per.foto','per.cui','per.telefono','per.correo','per.estado','per.centro_id',DB::raw("car.cargo as cargo"),DB::raw("usu.email as usuario"),DB::raw("gen.genero as genero"))
      ->where('per.nombres','LIKE','%'.$query.'%')
      ->orderBy('per.id','asc')
      ->paginate(7);

      return view('personal_administrativo.personal.index',["personales"=>$personales,"searchText"=>$query]);
    }
  }

  public function create(){
    $cargos=DB::table('cargo')->get();
    $generos=DB::table('genero')->get();
    $centros=DB::table('centro')->get();
    $users=DB::table('users')->get();
    return view("personal_administrativo.personal.create",["cargos"=>$cargos,"centros"=>$centros,"users"=>$users,"generos"=>$generos]);
  }

public function store(PersonalFormRequest $request /*Request $request*/){
    $personal= new Personal;
    $personal->id = $request->get('id');
    $personal->nombres = $request->get('nombres');
    $personal->apellidos = $request->get('apellidos');
    $personal->fecha_nac = $request->get('fecha_nac');
    $personal->lugar_nac = $request->get('lugar_nac');
    $personal->estado_civil = $request->get('estado_civil');
    $personal->direccion = $request->get('direccion');
    $personal->inicio_labores = $request->get('inicio_labores');
    if(Input::hasFile('foto')){
      $file=Input::file('foto');
      $file->move(public_path().'/imagenes/personal/',$file->getClientOriginalName());
      $personal->foto=$file->getClientOriginalName();
    }
    $personal->cui = $request->get('cui');
    $personal->telefono = $request->get('telefono');
    $personal->correo = $request->get('correo');
    $personal->estado = $request->get('estado');
    $personal->cargo_id = $request->get('cargo_id');
    $personal->usuario_id = $request->get('usuario_id');
    $personal->centro_id = $request->get('centro_id');
    $personal->genero_id = $request->get('genero_id');

    $personal->save();
    return Redirect::to('personal_administrativo/personal');
  }

  public function show($id){
    return view("personal_administrativo.personal.show",["personal"=>Personal::findOrFail($id)]);
  }

  public function edit($id){
    return view("personal_administrativo.personal.edit",["personal"=>Personal::findOrFail($id)]);
  }

  public function update(PersonalFormRequest $request, $id){

    $personal=Personal::findOrFail($id);
    $personal->nombres = $request->get('nombres');
    $personal->apellidos = $request->get('apellidos');
    $personal->fecha_nac = $request->get('fecha_nac');
    $personal->lugar_nac = $request->get('lugar_nac');
    $personal->estado_civil = $request->get('estado_civil');
    $personal->direccion = $request->get('direccion');
    $personal->inicio_labores = $request->get('inicio_labores');
    if(Input::hasFile('foto')){
      $file=Input::file('foto');
      $file->move(public_path().'/imagenes/personal/',$file->getClientOriginalName());
      $personal->foto=$file->getClientOriginalName();
    }
    $personal->cui = $request->get('cui');
    $personal->telefono = $request->get('telefono');
    $personal->correo = $request->get('correo');
    $personal->estado = $request->get('estado');
    $personal->cargo_id = $request->get('cargo_id');
    $personal->usuario_id = $request->get('usuario_id');
    $personal->centro_id = $request->get('centro_id');
    $personal->genero_id = $request->get('genero_id');
    $personal->update();

    return Redirect::to('personal_administrativo/personal');
  }

  public function destroy($id){
    $personal = DB::table('personal')->where('id', '=',$id)->delete();
    return Redirect::to('personal_administrativo/personal');
  }
}

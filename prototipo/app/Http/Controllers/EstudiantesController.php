<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Estudiantes;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EstudiantesFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class EstudiantesController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $estudiantes=DB::table('estudiante as est')
      ->join('genero as gen', 'est.genero_id','=','gen.id')
      ->select('est.id','est.codigo','est.nombres','est.apellidos','est.fecha_nac','est.direccion','est.clave','est.certificado','est.foto','est.estado',DB::raw("gen.genero as genero"))
      ->where('est.nombres','LIKE','%'.$query.'%')
      ->orderBy('est.id','asc')
      ->paginate(7);

      return view('estudiantes_encargados.estudiantes.index',["estudiantes"=>$estudiantes,"searchText"=>$query]);
    }
  }

  public function create(){
    $generos=DB::table('genero')->get();
    return view("estudiantes_encargados.estudiantes.create",["generos"=>$generos]);
  }

public function store(EstudiantesFormRequest $request /*Request $request*/){
    $estudiante= new Estudiantes;
    $estudiante->id = $request->get('id');
    $estudiante->codigo = $request->get('codigo');
    $estudiante->nombres = $request->get('nombres');
    $estudiante->apellidos = $request->get('apellidos');
    $estudiante->fecha_nac = $request->get('fecha_nac');
    $estudiante->direccion = $request->get('direccion');
    $estudiante->clave = $request->get('clave');

    if(Input::hasFile('certificado')){
      $file=Input::file('certificado');
      $file->move(public_path().'/imagenes/certificados/',$file->getClientOriginalName());
      $estudiante->certificado=$file->getClientOriginalName();
    }

    if(Input::hasFile('foto')){
      $file=Input::file('foto');
      $file->move(public_path().'/imagenes/estudiantes/',$file->getClientOriginalName());
      $estudiante->foto=$file->getClientOriginalName();
    }

    $estudiante->estado = $request->get('estado');
    $estudiante->genero_id = $request->get('genero_id');

    $estudiante->save();
    return Redirect::to('estudiantes_encargados/estudiantes');
  }

  public function show($id){
    $estudiante = DB::table('estudiante as est')
    ->join('genero as gen', 'est.genero_id','=','gen.id')
    ->select('est.id','est.codigo','est.nombres','est.apellidos','est.fecha_nac','est.direccion','est.clave','est.certificado','est.foto','est.estado',DB::raw("gen.genero as genero"))
    ->where('est.id','=',$id)->first();
    return view("estudiantes_encargados.estudiantes.show",["estudiante"=>Estudiantes::findOrFail($id)]);
  }

  public function edit($id){
    $generos=DB::table('genero')->get();
    return view("estudiantes_encargados.estudiantes.edit",["estudiante"=>Estudiantes::findOrFail($id),"generos"=>$generos]);
  }

  public function update(EstudiantesFormRequest $request, $id){

    $estudiante=Estudiantes::findOrFail($id);
    $estudiante->codigo = $request->get('codigo');
    $estudiante->nombres = $request->get('nombres');
    $estudiante->apellidos = $request->get('apellidos');
    $estudiante->fecha_nac = $request->get('fecha_nac');
    $estudiante->direccion = $request->get('direccion');
    $estudiante->clave = $request->get('clave');
    $estudiante->certificado = $request->get('certificado');
    $estudiante->foto = $request->get('foto');
    $estudiante->estado = $request->get('estado');
    $estudiante->genero_id = $request->get('genero_id');
    $estudiante->update();

    return Redirect::to('estudiantes_encargados/estudiantes');
  }

  public function destroy($id){
    $estudiante = DB::table('estudiante')->where('id', '=',$id)->delete();
    return Redirect::to('estudiantes_encargados/estudiantes');
  }
}

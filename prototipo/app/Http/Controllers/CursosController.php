<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cursos;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CursosFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class CursosController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $cursos=DB::table('curso as cur')
      ->join('grado as gra', 'cur.grado_id','=','gra.id')
      ->join('personal as per', 'cur.personal_id','=','per.id')
      ->select('cur.id','cur.codigo','cur.curso','cur.descripcion','cur.estado',DB::raw("gra.grado as grado"),DB::raw("per.nombres as nombre_personal"),DB::raw("per.apellidos as apellido_personal"))
      ->where('cur.codigo','LIKE','%'.$query.'%')
      ->orderBy('cur.id','asc')
      ->paginate(7);

      return view('cursos.curso.index',["cursos"=>$cursos,"searchText"=>$query]);
    }
  }

  public function create(){
    $grados=DB::table('grado')->get();
    $personales=DB::table('personal')->get();
    return view("cursos.curso.create",["grados"=>$grados,"personales"=>$personales]);
  }

  public function store(CursosFormRequest $request /*Request $request*/){
    $curso= new Cursos;
    $curso->id = $request->get('id');
    $curso->codigo = $request->get('codigo');
    $curso->curso = $request->get('curso');
    $curso->descripcion = $request->get('descripcion');
    $curso->estado = $request->get('estado');
    $curso->grado_id = $request->get('grado_id');
    $curso->personal_id = $request->get('personal_id');


    $curso->save();
    return Redirect::to('cursos/curso');
  }

  public function show($id){
    return view("cursos.curso.show",["curso"=>Cursos::findOrFail($id)]);
  }

  public function edit($id){
    return view("cursos.curso.edit",["curso"=>Cursos::findOrFail($id)]);
  }

  public function update(HorariosFormRequest $request, $id){

    $curso=Cursos::findOrFail($id);
    $curso->codigo = $request->get('codigo');
    $curso->curso = $request->get('curso');
    $curso->descripcion = $request->get('descripcion');
    $curso->estado = $request->get('estado');
    $curso->grado_id = $request->get('grado_id');
    $curso->personal_id = $request->get('personal_id');
    $curso->update();

    return Redirect::to('cursos/curso');
  }

  public function destroy($id){
    $curso = DB::table('curso')->where('id', '=',$id)->delete();
    return Redirect::to('cursos/curso');
  }
}

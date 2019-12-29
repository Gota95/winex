<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Collection;
use App\Estudiantes;

use DB;
use Barryvdh\DomPDF\Facade as PDF;

class BoletasController extends Controller
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

      return view('notas.boleta.index',["estudiantes"=>$estudiantes,"searchText"=>$query]);
    }
  }

      public function boletabi1(Request $request, $id){
        $datos=DB::table('asignacion as asig')
        ->join('grado as gra', 'asig.grado_id','=','gra.id')
        ->join('seccion as sec', 'asig.seccion_id','=','sec.id')
        ->join('estudiante as est', 'asig.estudiante_id','=','est.id')
        ->join('carrera1 as car', 'asig.carrera_id','=','car.id')
        ->join('ciclo as ci', 'asig.ciclo_id','=','ci.id')
        ->select('est.id',DB::raw("gra.grado as grado"),DB::raw("sec.seccion as seccion"),DB::raw("ci.fecha_inicio as fecha_inicio"),DB::raw("ci.fecha_fin as fecha_fin"),DB::raw("car.carrera as carrera"),DB::raw("est.nombres as nombre_estudiante"),DB::raw("est.apellidos as apellido_estudiante"))
        ->where('est.id','=',$id)->first();


        $notas=DB::table('nota as no')
        ->join('aspecto as asp', 'no.aspecto_id','=','asp.id')
        ->join('estudiante as est', 'no.estudiante_id','=','est.id')
        ->join('curso as cur', 'no.curso_id','=','cur.id')
        ->join('tipo_evaluacion as te', 'no.tipo_evaluacion_id','=','te.id')
        ->join('bimestre as bi', 'no.bimestre_id','=','bi.id')
        ->select('no.id','no.nota',DB::raw("asp.aspecto as aspecto"),DB::raw("est.nombres as nombre_estudiante"),DB::raw("est.apellidos as apellido_estudiante"),DB::raw("cur.curso as curso"),DB::raw("te.tipo as tipo_evaluacion"),DB::raw('bi.bimestre as bimestre'))
        ->whereRaw("no.estudiante_id = ({$id})")->get();

          $pdf = PDF::loadView('notas.boleta.boleta', compact('notas','datos'))->setPaper('oficio', 'portrait')->setWarnings(false)->save('boleta.pdf');
          return $pdf->stream('boleta.pdf');
      }
}

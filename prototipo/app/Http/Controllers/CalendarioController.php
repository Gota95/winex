<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Calendario;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CalendarioFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class CalendarioController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){

    $calendario = Calendario::all();
    $actividades=[];
    foreach ($calendario as $row)
    {
      //$enddate = $row->Fecha_fin."24:00:00;";
      $actividades[]=\Calendar::event(
        $row->Actividad,
        true,
        new \Datetime($row->Fecha_inicio),
        new \Datetime($row->Fecha_fin),
        $row->IdCalendario,
        [
          'color' => $row->Color,
        ]
      );
    }
    $calendar = \Calendar::addEvents($actividades);
    return view('calendario.index',["calenderio"=>$calendario,"calendar"=>$calendar]);

  }
  public function create(){
    $establecimientos=DB::table('establecimiento')->get();
    return view("calendario.create",["establecimientos"=>$establecimientos]);
  }

public function store(CalendarioFormRequest $request /*Request $request*/){
    $calendario= new Calendario;
    $calendario->IdCalendario = $request->get('IdCalendario');
    $calendario->Actividad = $request->get('Actividad');
    $calendario->Fecha_inicio = $request->get('Fecha_inicio');
    $calendario->Fecha_fin = $request->get('Fecha_fin');
    $calendario->Descripcion = $request->get('Descripcion');
    $calendario->Color = $request->get('Color');
    $calendario->establecimiento_id = $request->get('establecimiento_id');

    $calendario->save();
    return Redirect::to('calendario/');
  }

  public function show($id){
    return view("establecimiento_educativo.calendario.show",["calendario"=>Calendario::findOrFail($IdCalendario)]);
  }

  public function edit($id){
    return view("establecimiento_educativo.calendario.edit",["calendario"=>Calendario::findOrFail($IdCalendario)]);
  }

  public function update(CalendarioFormRequest $request, $id){

    $calendario=Calendario::findOrFail($IdCalendario);
    $calendario->Actividad = $request->get('Actividad');
    $calendario->Fecha = $request->get('Fecha');
    $calendario->Descripcion = $request->get('Descripcion');

    $calendario->update();

    return Redirect::to('establecimiento_educativo/calendario/');
  }

  public function destroy($id){
    $asistencia= DB::table('asistencia')->where('idAsistencia', '=',$id)->delete();
    return Redirect::to('notas/aspecto/');
  }
}

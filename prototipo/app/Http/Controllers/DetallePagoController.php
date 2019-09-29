<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DetallePago;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\DetallePagoFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class DetallePagoController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $det_pago=DB::table('detallepago as dtp')
      ->select('dtp.idDetallePago','dtp.monto')
      ->where('dtp.monto','LIKE','%'.$query.'%')
      ->orderBy('dtp.idDetallePago','asc')
      ->paginate(7);

      return view('notas.aspecto.index',["det_pago"=>$det_pago,"searchText"=>$query]);
    }
  }

  public function create(){
    return view("notas.aspecto.create");
  }

public function store(DetallePagoFormRequest $request /*Request $request*/){
    $det_pago= new DetallePago;
    $det_pago->idDetallePago = $request->get('idDetallePago');
    $det_pago->monto = $request->get('monto');


    $det_pago->save();
    return Redirect::to('notas/aspecto/');
  }

  public function show($id){
    return view("notas.aspecto.show",["det_pago"=>DetallePago::findOrFail($id)]);
  }

  public function edit($id){
    return view("notas.aspecto.edit",["det_pago"=>DetallePago::findOrFail($id)]);
  }

  public function update(DetallePagoFormRequest $request, $id){

    $det_pago=DetallePago::findOrFail($id);
    $det_pago->monto = $request->get('monto');

    $det_pago->update();

    return Redirect::to('notas/aspecto/');
  }

  public function destroy($id){
    $det_pago= DB::table('detallepago')->where('idDetallePago', '=',$id)->delete();
    return Redirect::to('notas/aspecto/');
  }
}

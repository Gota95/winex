<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bimestre;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\BimestreFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class BimestreController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $bimestres=DB::table('bimestre as bi')
      ->join('ciclo as ci', 'bi.ciclo_id','=','ci.id')
      ->select('bi.id','bi.bimestre')
      ->where('bi.bimestre','LIKE','%'.$query.'%')
      ->orderBy('bi.id','asc')
      ->paginate(7);

      return view('ciclo_bimestre.bimestre.index',["bimestres"=>$bimestres,"searchText"=>$query]);
    }
  }

  public function create(){

    $ciclos=DB::table('ciclo')->get();
    return view("ciclo_bimestre.bimestre.create",["ciclos"=>$ciclos]);
  }

public function store(BimestreFormRequest $request /*Request $request*/){
    $bimestre= new Bimestre;
    $bimestre->id = $request->get('id');
    $bimestre->bimestre = $request->get('bimestre');
    $bimestre->ciclo_id = $request->get('ciclo_id');

    $bimestre->save();
    return Redirect::to('ciclo_bimestre/bimestre/');
  }

  public function show($id){
    return view("ciclo_bimestre.bimestre.show",["bimestre"=>Bimestre::findOrFail($id)]);
  }

  public function edit($id){
    $ciclos=DB::table('ciclo')->get();
    return view("ciclo_bimestre.bimestre.edit",["bimestre"=>Bimestre::findOrFail($id),"ciclos"=>$ciclos]);
  }

  public function update(BimestreFormRequest $request, $id){

    $bimestre=Bimestre::findOrFail($id);
    $bimestre->bimestre = $request->get('bimestre');
    $bimestre->ciclo_id = $request->get('ciclo_id');
    $bimestre->update();

    return Redirect::to('ciclo_bimestre/bimestre/');
  }

  public function destroy($id){
    $bimestre = DB::table('bimestre')->where('id', '=',$id)->delete();
    return Redirect::to('ciclo_bimestre/bimestre/');
  }
}

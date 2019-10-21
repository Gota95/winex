<?php

namespace App\Http\Controllers;

use App\Lamina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\LaminaFormRequest;
use Illuminate\Support\Facades\Input;

use DB;

class LaminaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if ($request) {
        $query= trim($request->get('searchText'));
        $laminas=DB::table('laminas as lam')
        ->join('categoria as cat', 'lam.categoria_id','=','cat.id')
        ->select('lam.id','lam.nombre','lam.lamina','lam.descripcion',DB::raw("cat.nombre as categoria"))
        ->where('lam.nombre','LIKE','%'.$query.'%')
        ->orderBy('lam.id','asc')
        ->paginate(7);

        return view('laminas.index',["laminas"=>$laminas,"searchText"=>$query]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categorias=DB::table('categoria')->get();
      return View("laminas.create",["categorias"=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $lamina=new Lamina;
      $lamina->id=$request->get('id');
      $lamina->nombre=$request->get('nombre');
      if(Input::hasFile('lamina')){
        $file=Input::file('lamina');
        $file->move(public_path().'/anexos/',$file->getClientOriginalName());
        $lamina->lamina=$file->getClientOriginalName();
      }
      $lamina->descripcion=$request->get('descripcion');
      $lamina->categoria_id=$request->get('categoria_id');

      $lamina->save();

      return Redirect::to('laminas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return view("laminas.show",["lamina"=>Lamina::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $categorias=DB::table('categoria')->get();
      return View("laminas.edit",["categorias"=>$categorias,"laminas"=>Lamina::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $lamina= Lamina::findOrFail($id);
      $lamina->id=$request->get('id');
      $lamina->nombre=$request->get('nombre');
      $lamina->lamina=$request->get('foto');
      $lamina->descripcion=$request->get('descripcion');
      $lamina->categoria_id=$request->get('categoria_id');

      $lamina->Update();

      return Redirect::to('laminas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $laminas = DB::table('laminas')->where('id', '=',$id)->delete();
      return Redirect::to('laminas/');
    }
}

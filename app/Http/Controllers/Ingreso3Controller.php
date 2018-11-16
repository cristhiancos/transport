<?php

namespace transportes\Http\Controllers;

use Illuminate\Http\Request;

use transportes\Http\Requests;
use transportes\Transport3;
use Illuminate\Support\Facades\Redirect;
use transportes\Http\Requests\Ingreso3FormRequest;
use DB;

class Ingreso3Controller extends Controller
{
  public function __construct ()
  {
    $this -> middleware('auth');
  }
  public function index (Request $request)
  {
    if ($request)
    {
      $query=trim($request->get('searchText'));
      $ingresos3=DB::table('transportes3')->where('nombre','LIKE','%'.$query.'%')

      ->orderBy('created_at','asc')
      ->paginate(100000000);
      return view('sistema.ingreso3.index',["ingresos3"=>$ingresos3,"searchText"=>$query]);
    }

  }
  public function create ()
  {
    return view("sistema.ingreso3.create");
  }

  public function store (Ingreso3FormRequest $request)
  {
    $ingreso3=new Transport3;
    $ingreso3->numacta=$request->get('numacta');
    $ingreso3->fecha=$request->get('fecha');
    $ingreso3->placavehiculo=$request->get('placavehiculo');
    $ingreso3->servicio=$request->get('servicio');
    $ingreso3->lugar=$request->get('lugar');
    $ingreso3->razonsocial=$request->get('razonsocial');
    $ingreso3->nombre=$request->get('nombre');
    $ingreso3->domicilio=$request->get('domicilio');
    $ingreso3->motivo=$request->get('motivo');
    $ingreso3->codigo=$request->get('codigo');
    $ingreso3->documentoret=$request->get('documentoret');
    $ingreso3->inspector=$request->get('inspector');


    $ingreso3->save();
    return Redirect::to('sistema/ingreso3');

  }
  public function show ($id)
  {
    return view("sistema.ingreso3.show",["ingreso3"=>Transport3::findOrFail($id)]);

  }
  public function edit ($id)
  {
    return view("sistema.ingreso3.edit",["ingreso3"=>Transport3::findOrFail($id)]);

  }
  public function update (Ingreso3FormRequest $request,$id)
  {
    $ingreso3=Transport3::findOrFail($id);
    $ingreso3->numacta=$request->get('numacta');
    $ingreso3->fecha=$request->get('fecha');
    $ingreso3->placavehiculo=$request->get('placavehiculo');
    $ingreso3->servicio=$request->get('servicio');
    $ingreso3->lugar=$request->get('lugar');
    $ingreso3->razonsocial=$request->get('razonsocial');
    $ingreso3->nombre=$request->get('nombre');
    $ingreso3->domicilio=$request->get('domicilio');
    $ingreso3->motivo=$request->get('motivo');
    $ingreso3->codigo=$request->get('codigo');
    $ingreso3->documentoret=$request->get('documentoret');
    $ingreso3->inspector=$request->get('inspector');
    $ingreso3->update();
    return Redirect::to('sistema/ingreso3');
  }
  public function destroy ($id)
  {
    $ingreso3=Transport3::findOrFail($id);
    $ingreso3->delete();

    return Redirect::to('sistema/ingreso3');
  }
}

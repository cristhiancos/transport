<?php

namespace transportes\Http\Controllers;

use Illuminate\Http\Request;

use transportes\Http\Requests;
use transportes\Transport2;
use Illuminate\Support\Facades\Redirect;
use transportes\Http\Requests\Ingreso2FormRequest;
use DB;


class Ingreso2Controller extends Controller
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
      $ingresos2=DB::table('transportes2')->where('nombre','LIKE','%'.$query.'%')

      ->orderBy('created_at','asc')
      ->paginate(100000000);
      return view('sistema.ingreso2.index',["ingresos2"=>$ingresos2,"searchText"=>$query]);
    }

  }
  public function create ()
  {
    return view("sistema.ingreso2.create");
  }

  public function store (Ingreso2FormRequest $request)
  {
    $ingreso2=new Transport2;
    $ingreso2->nombre=$request->get('nombre');
    $ingreso2->numlicencia=$request->get('numlicencia');
    $ingreso2->tipoinfraccion=$request->get('tipoinfraccion');
    $ingreso2->sancion=$request->get('sancion');
    $ingreso2->multa=$request->get('multa');
    $ingreso2->rdrnumero=$request->get('rdrnumero');
    $ingreso2->rdrfecha=$request->get('rdrfecha');
    $ingreso2->puntoacum=$request->get('puntoacum');
    $ingreso2->levoficio=$request->get('levoficio');
    $ingreso2->levfecha=$request->get('levfecha');


    $ingreso2->save();
    return Redirect::to('sistema/ingreso2');

  }
  public function show ($id)
  {
    return view("sistema.ingreso2.show",["ingreso2"=>Transport2::findOrFail($id)]);

  }
  public function edit ($id)
  {
    return view("sistema.ingreso2.edit",["ingreso2"=>Transport2::findOrFail($id)]);

  }
  public function update (Ingreso2FormRequest $request,$id)
  {
    $ingreso2=Transport2::findOrFail($id);
    $ingreso2->nombre=$request->get('nombre');
    $ingreso2->numlicencia=$request->get('numlicencia');
    $ingreso2->tipoinfraccion=$request->get('tipoinfraccion');
    $ingreso2->sancion=$request->get('sancion');
    $ingreso2->multa=$request->get('multa');
    $ingreso2->rdrnumero=$request->get('rdrnumero');
    $ingreso2->rdrfecha=$request->get('rdrfecha');
    $ingreso2->puntoacum=$request->get('puntoacum');
    $ingreso2->levoficio=$request->get('levoficio');
    $ingreso2->levfecha=$request->get('levfecha');
    $ingreso2->update();
    return Redirect::to('sistema/ingreso2');
  }
  public function destroy ($id)
  {
    $ingreso2=Transport2::findOrFail($id);
    $ingreso2->delete();

    return Redirect::to('sistema/ingreso2');
  }
}

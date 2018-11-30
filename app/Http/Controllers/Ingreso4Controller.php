<?php

namespace transportes\Http\Controllers;

use Illuminate\Http\Request;

use transportes\Http\Requests;
use transportes\Transport4;
use Illuminate\Support\Facades\Redirect;
use transportes\Http\Requests\Ingreso4FormRequest;
use DB;

class Ingreso4Controller extends Controller
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
      $ingresos4=DB::table('transportes4')->where('nombre','LIKE','%'.$query.'%')

      ->orderBy('created_at','asc')
      ->paginate(100000000);
      return view('sistema.ingreso4.index',["ingresos4"=>$ingresos4,"searchText"=>$query]);
    }

  }
  public function create ()
  {
    return view("sistema.ingreso4.create");
  }

  public function store (ingreso4FormRequest $request)
  {
    $ingreso4=new Transport4;
    $ingreso4->numlicencia=$request->get('numlicencia');
    $ingreso4->tipolicencia=$request->get('tipolicencia');
    $ingreso4->nombre=$request->get('nombre');
    $ingreso4->clase=$request->get('clase');
    $ingreso4->categoria=$request->get('categoria');
    $ingreso4->fechaexpe=$request->get('fechaexpe');

    $ingreso4->fechavenc=$request->get('fechavenc');
    $ingreso4->numfichamed=$request->get('numfichamed');
    $ingreso4->fechamed=$request->get('fechamed');
    $ingreso4->restriccionesmed=$request->get('restriccionesmed');
    $ingreso4->registrodeconduc=$request->get('registrodeconduc');
    $ingreso4->numanterior=$request->get('numanterior');




    $ingreso4->save();
    return Redirect::to('sistema/ingreso4');

  }
  public function show ($id)
  {
    return view("sistema.ingreso4.show",["ingreso4"=>Transport4::findOrFail($id)]);

  }
  public function edit ($id)
  {
    return view("sistema.ingreso4.edit",["ingreso4"=>Transport4::findOrFail($id)]);

  }
  public function update (ingreso4FormRequest $request,$id)
  {
    $ingreso4=Transport4::findOrFail($id);
    $ingreso4->numlicencia=$request->get('numlicencia');
    $ingreso4->tipolicencia=$request->get('tipolicencia');
    $ingreso4->nombre=$request->get('nombre');
    $ingreso4->clase=$request->get('clase');
    $ingreso4->categoria=$request->get('categoria');
    $ingreso4->fechaexpe=$request->get('fechaexpe');
    $ingreso4->fechavenc=$request->get('fechavenc');
    $ingreso4->numfichamed=$request->get('numfichamed');
    $ingreso4->fechamed=$request->get('fechamed');
    $ingreso4->restriccionesmed=$request->get('restriccionesmed');
    $ingreso4->registrodeconduc=$request->get('registrodeconduc');
    $ingreso4->numanterior=$request->get('numanterior');
    $ingreso4->update();
    return Redirect::to('sistema/ingreso4');
  }
  public function destroy ($id)
  {
    $ingreso4=Transport4::findOrFail($id);
    $ingreso4->delete();

    return Redirect::to('sistema/ingreso4');
  }
}

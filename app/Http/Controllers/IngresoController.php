<?php

namespace transportes\Http\Controllers;

use Illuminate\Http\Request;

use transportes\Http\Requests;
use transportes\Transport;
use Illuminate\Support\Facades\Redirect;
use transportes\Http\Requests\IngresoFormRequest;
use DB;

class IngresoController extends Controller
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
      $categorias=DB::table('transportes')->where('nombre','LIKE','%'.$query.'%')

      ->orderBy('created_at','asc')
      ->paginate(1000000000);
      return view('sistema.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
    }

  }
  public function create ()
  {
    return view("sistema.categoria.create");
  }

  public function store (IngresoFormRequest $request)
  {
    $categoria=new Transport;
    $categoria->nombre=$request->get('nombre');
    $categoria->oficio=$request->get('oficio');
    $categoria->documentos=$request->get('documentos');
    $categoria->observaciones=$request->get('observaciones');

    $categoria->save();
    return Redirect::to('sistema/categoria');

  }
  public function show ($id)
  {
    return view("sistema.categoria.show",["categoria"=>Transport::findOrFail($id)]);

  }
  public function edit ($id)
  {
    return view("sistema.categoria.edit",["categoria"=>Transport::findOrFail($id)]);

  }
  public function update (IngresoFormRequest $request,$id)
  {
    $categoria=Transport::findOrFail($id);
    $categoria->nombre=$request->get('nombre');
    $categoria->oficio=$request->get('oficio');
    $categoria->documentos=$request->get('documentos');
    $categoria->observaciones=$request->get('observaciones');
    $categoria->update();
    return Redirect::to('sistema/categoria');
  }
  public function destroy ($id)
  {
    $categoria=Transport::findOrFail($id);
    $categoria->delete();

    return Redirect::to('sistema/categoria');
  }
}

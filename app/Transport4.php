<?php

namespace transportes;

use Illuminate\Database\Eloquent\Model;

class Transport4 extends Model
{
  protected $table='transportes4';
  protected $primaryKey ='numlicencia';
  public $timestammos=true;
  public $incrementing = false;


  protected $filllable = [

    'tipolicencia',
    'nombre',
    'clase',
    'categoria',
    'fechaexpe',
    'fechavenc',
    'numfichamed',
    'fechamed',
    'restriccionesmed',
    'registrodeconduc',
    'numanterior'

  ];

  protected $guarded =[

  ];
}

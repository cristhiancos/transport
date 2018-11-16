<?php

namespace transportes;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
  protected $table='transportes';
  protected $primaryKey ='numero';
  public $timestammos=false;


  protected $filllable = [
    'nombre',
    'oficio',
    'documentos',
    'observaciones'
  ];

  protected $guarded =[

  ];

}

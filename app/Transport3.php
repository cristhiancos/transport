<?php

namespace transportes;

use Illuminate\Database\Eloquent\Model;

class Transport3 extends Model
{
  protected $table='transportes3';
  protected $primaryKey ='numero';
  public $timestammos=true;


  protected $filllable = [
    'numacta',
    'fecha',
    'placavehiculo',
    'servicio',
    'lugar',
    'razonsocial',
    'nombre',
    'domicilio',
    'motivo',
    'codigo',
    'documentoret',
    'inspector'

  ];

  protected $guarded =[

  ];

}

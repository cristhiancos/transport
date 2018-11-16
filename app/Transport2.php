<?php

namespace transportes;

use Illuminate\Database\Eloquent\Model;

class Transport2 extends Model
{
  protected $table='transportes2';
  protected $primaryKey ='numeroa';
  public $timestammos=true;


  protected $filllable = [
    'nombre',
    'numlicencia',
    'tipoinfraccion',
    'sancion',
    'multa',
    'rdrnumero',
    'rdrfecha',
    'puntoacum',
    'levoficio',
    'levfecha'

  ];

  protected $guarded =[

  ];

}

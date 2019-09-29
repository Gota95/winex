<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensajeria extends Model
{
  protected $table='mensajeria';
  protected $primaryKey='IdMensajeria';

  public $timestamps =false;

  protected $fillable = [
    'Mensaje',
    'Fecha',
    'seccion_id'

  ];
}

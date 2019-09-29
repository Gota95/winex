<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
  protected $table='calendario';
  protected $primaryKey='IdCalendario';

  public $timestamps =false;

  protected $fillable = [
    'Actividad',
    'Fecha',
    'Descripcion'
  ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
  protected $table='asistencia';
  protected $primaryKey='idAsistencia';

  public $timestamps =false;

  protected $fillable = [
    'Hora',
    'Fecha',
    'idcarrera',
    'idgrado',
    'idseccion'
  ];
}

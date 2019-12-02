<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleAsistencia extends Model
{
  protected $table='detalle_asistencia';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'idalumno',
    'idasistencia',
    'presente'
  ];
}

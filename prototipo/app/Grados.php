<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grados extends Model
{
  protected $table='grado';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'grado',
    'ciclo_id',
    'carrera_id',
    'jornada_id'
  ];
}

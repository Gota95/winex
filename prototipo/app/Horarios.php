<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
  protected $table='horario';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'hora_inicio',
    'hora_fin',
    'dia',
    'curso_id',
    'seccion_id'
  ];
}

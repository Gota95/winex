<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
  protected $table='actividad';
  protected $primaryKey='IdActividad';

  public $timestamps =false;

  protected $fillable = [
    'Nombre_Actividad',
    'Detalle',
    'Fecha_inicio',
    'Fecha_fin',
    'Punteo',
    'Observaciones',
    'curso_id'
  ];
}

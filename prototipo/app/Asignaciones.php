<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignaciones extends Model
{
  protected $table='asignacion';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'fecha_asignacion',
    'nuevo_reingreso',
    'estudiante_id',
    'ciclo_id',
    'seccion_id',
    'grado_id',
    'carrera_id'
  ];
}

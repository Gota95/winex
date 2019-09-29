<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
  protected $table='nota';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'nota',
    'aspecto_id',
    'estudiante_id',
    'tipo_evaluacion',
    'bimestre_id',
    'curso_id'
  ];
}

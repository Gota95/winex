<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEvaluacion extends Model
{
  protected $table='tipo_evaluacion';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'tipo'
  ];
}

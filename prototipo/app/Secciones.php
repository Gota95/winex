<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secciones extends Model
{
  protected $table='seccion';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'seccion',
    'estado',
    'grado_id'
  ];
}

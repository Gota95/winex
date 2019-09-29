<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carnet extends Model
{
  protected $table='carnet';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'numerocarnet',
    'codigo_qr',
    'estudiante_id',
    'seccion_id'
  ];
}

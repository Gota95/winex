<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
  protected $table='ciclo';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'fecha_inicio',
    'fecha_fin',
    'estado'
  ];
}

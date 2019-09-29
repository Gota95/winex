<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jornadas extends Model
{
  protected $table='jornada';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'jornada',
    'estado'
  ];
}

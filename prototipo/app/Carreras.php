<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carreras extends Model
{
  protected $table='carrera1';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'carrera',
    'estado'
  ];
}

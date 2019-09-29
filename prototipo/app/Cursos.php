<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
  protected $table='curso';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'codigo',
    'curso',
    'descripcion',
    'estado',
    'grado_id',
    'personal_id'
  ];
}

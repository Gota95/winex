<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encargados extends Model
{
  protected $table='encargado';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'nombres',
    'apellidos',
    'fecha_nac',
    'direccion',
    'telefono',
    'cui',
    'parentesco',
    'genero_id',
    'estudiante_id'
  ];
}

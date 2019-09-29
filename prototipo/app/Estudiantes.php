<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
  protected $table='estudiante';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'codigo',
    'nombres',
    'apellidos',
    'fecha_nac',
    'direccion',
    'clave',
    'certificado',
    'foto',
    'estado',
    'genero_id'
  ];
}

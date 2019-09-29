<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
  protected $table='personal';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'nombres',
    'apellidos',
    'fecha_nac',
    'lugar_nac',
    'estado_civil',
    'direccion',
    'inicio_labores',
    'foto',
    'cui',
    'telefono',
    'correo',
    'estado',
    'cargo_id',
    'usuario_id',
    'centro_id',
    'genero_id'
  ];
}

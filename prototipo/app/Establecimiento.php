<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
  protected $table='establecimiento';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'nombre',
    'direccion',
    'departamento',
    'ciudad',
    'logo',
    'telefono1',
    'telefono2'
  ];
}

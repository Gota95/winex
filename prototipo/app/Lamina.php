<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lamina extends Model
{
  protected $table='laminas';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'nombre',
    'lamina',
    'descripcion',
    'categoria_id'
  ];
}

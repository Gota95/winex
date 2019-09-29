<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
  protected $table='cargo';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'cargo'
  ];
}

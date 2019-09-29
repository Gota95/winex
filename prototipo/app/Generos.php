<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generos extends Model
{
  protected $table='genero';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'genero'
  ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aspectos extends Model
{
  protected $table='aspecto';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'aspecto',
    'nota_minima',
    'nota_max'
  ];
}

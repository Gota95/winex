<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bimestre extends Model
{
  protected $table='bimestre';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'bimestre',
    'ciclo_id'
  ];
}

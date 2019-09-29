<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePago extends Model
{
  protected $table='detallepago';
  protected $primaryKey='idDetallePago';

  public $timestamps =false;

  protected $fillable = [
    'Monto'
  ];
}

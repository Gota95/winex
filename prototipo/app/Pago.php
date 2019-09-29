<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
  protected $table='pago';
  protected $primaryKey='idPago';

  public $timestamps =false;

  protected $fillable = [
    'Total',
    'Fecha',
    'Estado',
    'estudiante_id'

  ];
}

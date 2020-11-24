<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaccione extends Model
{
    protected $fillable = ['id','tipo','fecha','cuenta','categoria','detalle','monto'];
    public $timestamps = false;
}

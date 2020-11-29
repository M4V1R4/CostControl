<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $fillable = ['id','tipo','user_id','fecha','categoria','cuenta','detalle','monto'];
    public $timestamps = false;
}

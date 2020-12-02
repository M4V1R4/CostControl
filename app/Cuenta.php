<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $fillable = ['id','user_id','moneda_id','nombre','descripcion','saldoInicial','icono'];
    public $timestamps = false;
}

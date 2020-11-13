<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    protected $fillable = ['id','nombre','user_id','simbolo','descripcion','tasa'];
    public $timestamps = false;
}

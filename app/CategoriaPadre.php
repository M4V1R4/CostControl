<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaPadre extends Model
{
    //id, tipo, descripcion
    protected $fillable = ['id','tipo','descripcion'];
    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //id, "id_catPadre", tipo, descripcion, icono, presupuesto
    protected $fillable = ['id','user_id','catPadre','tipo','descripcion','presupuesto','icono'];
    public $timestamps = false;

}

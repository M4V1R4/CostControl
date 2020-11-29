<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MisCategorias extends Model
{
    
    protected $fillable = ['id','user_id','categoriaP','subcategoria'];
    public $timestamps = false;
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMisCategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mis_categorias', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('user_id');
            $table->string('categoriaP')->unsigned()->nullable();
            $table->string('subcategoria')->unsigned()->nullable();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mis_categorias');
    }
}

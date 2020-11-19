<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_catPadre');
            $table->string('user_id');
            $table->string('tipo');
            $table->string('descripcion');
            $table->string('comentario')->unsigned()->nullable();
            $table->string('icono')->unsigned()->nullable();
            $table->double('presupuesto');
            $table->foreign('id_catPadre')->references('id')->on('categoriaPadre');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
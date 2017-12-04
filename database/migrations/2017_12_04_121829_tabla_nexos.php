<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaNexos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nexos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->string('direccion');
            $table->string('clave',20);
            $table->integer('obac')->unsigned()->nullable();
            $table->foreign('obac')->references('id')->on('usuarios');
            $table->string('obac_cbi',200)->nullable();
            $table->string('unidades')->nullable();
            $table->enum('estado',['A','T']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nexos');
    }
}

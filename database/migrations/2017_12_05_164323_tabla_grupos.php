<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaGrupos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',150);
            $table->string('funcion',150);
            $table->integer('obac')->unsigned();
            $table->foreign('obac')->references('id')->on('usuarios');
            $table->integer('nexo_id')->unsigned();
            $table->foreign('nexo_id')->references('id')->on('nexos');
            $table->integer('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('estados_grupos');
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
        Schema::dropIfExists('grupos');
    }
}

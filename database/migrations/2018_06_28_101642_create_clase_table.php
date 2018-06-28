<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clase', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_clase');
            $table->string('nombre_habilidad');
            $table->string('nombre_raza');
            $table->foreign('nombre_raza')->references('nombre_raza')->on('razas')->onDelete('cascade');
            $table->foreign('nombre_habilidad')->references('nombre_habilidad')->on('habilidades')->onDelete('cascade');
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
        //
    }
}

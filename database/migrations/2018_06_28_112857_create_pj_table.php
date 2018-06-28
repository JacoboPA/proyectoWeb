<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePjTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personajes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_clase');
            $table->string('nombre_raza');
            $table->string('nombre')->unique();
            $table->String('historia');
            $table->String('imagen');
            $table->String('name');
            $table->foreign('name')->references('name')->on('users')->onDelete('cascade');
            $table->foreign('nombre_clase')->references('nombre_clase')->on('clase')->onDelete('cascade');
            $table->foreign('nombre_raza')->references('nombre_raza')->on('razas')->onDelete('cascade');
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
        Schema::dropIfExists('personajes');

    }
}

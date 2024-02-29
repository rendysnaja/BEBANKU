<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutinitas', function (Blueprint $table) {
            $table->id();
            $table->string('rutinitas_nama');
            $table->string('rutinitas_status');
            $table->integer('rutinitas_pelaksana');
            $table->integer('rutinitas_lamajam');
            $table->integer('rutinitas_lamamenit');
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
        Schema::dropIfExists('rutinitas');
    }
};

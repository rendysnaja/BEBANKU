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
        Schema::create('absenrutinitas', function (Blueprint $table) {
            $table->id();
            $table->integer('rutinitas_id');
            $table->string('absenrutinitas_tanggalpelaksanaan');
            $table->string('absenrutinitas_deskripsi');
            $table->integer('absenrutinitas_lamajam');
            $table->integer('absenrutinitas_lamamenit');
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
        Schema::dropIfExists('absenrutinitas');
    }
};

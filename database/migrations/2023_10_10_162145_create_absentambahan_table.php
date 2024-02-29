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
        Schema::create('absentambahan', function (Blueprint $table) {
            $table->id();
            $table->integer('tambahan_id');
            $table->string('absentambahan_tanggal');
            $table->string('absentambahan_deskripsi');
            $table->integer('absentambahan_lamajam');
            $table->integer('absentambahan_lamamenit');
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
        Schema::dropIfExists('absentambahan');
    }
};

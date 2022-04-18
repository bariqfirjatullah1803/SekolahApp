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
        Schema::create('siswa', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('nisn')->unique();
            $table->string('nama_siswa',255);
            $table->string('jenis_kelamin',11);
            $table->text('alamat');
            $table->unsignedBigInteger('sekolah_id');
            $table->foreign('sekolah_id')->references('id')->on('sekolah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};

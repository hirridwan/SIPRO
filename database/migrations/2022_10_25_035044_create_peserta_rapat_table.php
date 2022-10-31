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
        Schema::create('peserta_rapat', function (Blueprint $table) {
            $table->id();
            $table->integer('pegawai_id')->nullable();
            $table->integer('rapat_id')->nullable();
            $table->integer('status_kehadiran_id')->nullable();
            $table->datetime('tgl_verifikasi_notulen')->nullable();
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
        Schema::dropIfExists('peserta_rapat');
    }
};

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
        Schema::create('rapat', function (Blueprint $table) {
            $table->id();
            $table->string('no_registrasi')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('jam')->nullable();
            $table->string('tempat')->nullable();
            $table->string('pimpinan')->nullable();
            $table->integer('notulis_id')->nullable();
            $table->longtext('pembahasan')->nullable();
            $table->string('office_code',3)->nullable();
            $table->string('link_notulen')->nullable();
            $table->datetime('tgl_verifikasi_notulen')->nullable();
            $table->integer('selesai')->nullable();
            $table->datetime('tgl_selesai_rapat')->nullable();
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
        Schema::dropIfExists('rapat');
    }
};

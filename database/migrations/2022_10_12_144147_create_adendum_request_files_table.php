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
        Schema::create('adendum_request_files', function (Blueprint $table) {
            $table->id();
            $table->integer('adendum_request_id')->nullable();
            $table->string('berkas_kredit')->nullable();
            $table->string('permohonan_nasabah')->nullable();
            $table->string('berkas_slik')->nullable();
            $table->string('janji_bayar')->nullable();
            $table->string('berkas_tambahan_1')->nullable();
            $table->string('berkas_tambahan_2')->nullable();
            $table->string('berkas_tambahan_3')->nullable();
            $table->string('berkas_tambahan_4')->nullable();
            $table->string('berkas_tambahan_5')->nullable();
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
        Schema::dropIfExists('adendum_request_files');
    }
};

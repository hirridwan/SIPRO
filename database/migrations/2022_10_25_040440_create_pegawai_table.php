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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama',150);
            $table->string('office_code')->nullable();
            $table->integer('unit_kerja_id')->nullable();
            $table->integer('jabatan_id')->nullable();
            $table->integer('bagian_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->binary('ttd')->nullable();
            $table->binary('foto')->nullable();
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
        Schema::dropIfExists('pegawai');
    }
};

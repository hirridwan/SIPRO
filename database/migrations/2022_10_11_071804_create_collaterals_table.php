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
        Schema::create('collaterals', function (Blueprint $table) {
            $table->id();
            $table->string('agunan_id');
            $table->string('collateral_type_code')->nullable();
            $table->string('peringkat_surat_berharga')->nullable();
            $table->string('pemeringkat')->nullable();
            $table->string('jenis_pengikatan')->nullable();
            $table->string('bukti_kepemilikan')->nullable();
            $table->string('keterangan_agunan')->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->string('alamat_agunan')->nullable();
            $table->string('lokasi_agunan')->nullable();
            $table->string('nilai_jaminan')->nullable();
            $table->string('nilai_pasar')->nullable();
            $table->string('nilai_taksasi')->nullable();
            $table->string('nilai_apraisal')->nullable();
            $table->string('insurance_status_code')->nullable()->default('01');
            $table->integer('loan_id');
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
        Schema::dropIfExists('collaterals');
    }
};

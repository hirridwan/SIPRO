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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('cif');
            $table->string('name',150);
            $table->string('address',255);
            $table->string('kota_kab_code')->nullable();
            $table->string('kecamatan')->nullable()->nullable();
            $table->string('desa')->nullable()->nullable();
            $table->string('postal_code')->nullable()->nullable();
            $table->string('identity_id',30)->nullable();
            $table->string('family_card_id',30)->nullable();
            $table->string('married_certificate_id',30)->nullable();
            $table->string('tax_identification_number',30)->nullable();
            $table->string('birth_place',100)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('work_address')->nullable();
            $table->integer('job_type_id')->nullable();
            $table->string('job_description')->nullable();
            $table->string('job_title')->nullable();
            $table->string('company_name')->nullable();
            $table->integer('working_period')->nullable();
            $table->string('side_job')->nullable();
            $table->integer('marital_status_id')->nullable();
            $table->string('office_code',3)->nullable();
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
        Schema::dropIfExists('customers');
    }
};

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
        Schema::create('financial_analysis_details', function (Blueprint $table) {
            $table->id();
            $table->integer('financial_analysis_id')->nullable();
            $table->string('financial_analysis_reg_number',60)->nullable();
            $table->string('financial_analysis_code',50)->nullable();
            $table->decimal('nominal',18,2)->nullable();
            $table->string('description',200)->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('financial_analysis_details');
    }
};

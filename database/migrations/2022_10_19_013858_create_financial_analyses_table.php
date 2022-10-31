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
        Schema::create('financial_analyses', function (Blueprint $table) {
            $table->id();
            $table->string('reg_number',60)->nullable();
            $table->date('date')->nullable();
            $table->integer('adendum_requests_id')->nullable();
            $table->integer('loan_id')->nullable();
            $table->integer('cif')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('analysis_status_id')->nullable();
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
        Schema::dropIfExists('financial_analyses');
    }
};

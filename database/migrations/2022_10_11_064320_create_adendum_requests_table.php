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
        Schema::create('adendum_requests', function (Blueprint $table) {
            $table->id();
            $table->string('reg_number',100);
            $table->date('reg_date');
            $table->string('request_code',50)->nullable();
            $table->decimal('old_outstanding',18,2)->nullable();
            $table->decimal('old_interest',18,2)->nullable();
            $table->decimal('old_plafon',18,2)->nullable();
            $table->decimal('old_provision',18,2)->nullable();
            $table->integer('old_period')->nullable();
            $table->date('old_start_date')->nullable();
            $table->date('old_due_date')->nullable();
            $table->string('old_installment_system_code')->nullable();
            $table->string('old_interest_system_code')->nullable();
            $table->decimal('adendum_outstanding',18,2)->nullable();
            $table->decimal('adendum_interest',18,2)->nullable();
            $table->decimal('adendum_plafon',18,2)->nullable();
            $table->decimal('adendum_provision',18,2)->nullable();
            $table->integer('adendum_period')->nullable();
            $table->date('adendum_start_date')->nullable();
            $table->date('adendum_due_date')->nullable();
            $table->decimal('payment_plan',18,2)->nullable();
            $table->integer('interest_arrear_treatment_id')->nullable();
            $table->string('installment_system_code',5)->nullable();
            $table->string('interest_system_code',5)->nullable();
            $table->integer('analysis_id')->nullable();
            $table->integer('surveyor_user_id')->nullable();
            $table->integer('kabag_user_id')->nullable();
            $table->integer('surveyor_review_user_id')->nullable();
            $table->integer('kabag_review_user_id')->nullable();
            $table->integer('legal_user_id')->nullable();
            $table->integer('adendum_status_id')->nullable();
            $table->integer('adendum_committee_status_id')->nullable();
            $table->integer('adendum_request_file_id')->nullable();
            $table->string('loan_id',30)->nullable();
            $table->integer('analysis_count')->default('0');
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
        Schema::dropIfExists('adendum_requests');
    }
};

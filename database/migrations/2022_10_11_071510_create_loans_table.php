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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('office_code',3);
            $table->string('loan_id');
            $table->string('cif',30)->nullable();
            $table->decimal('plafon',18,2)->nullable();
            $table->decimal('interest',18,2)->nullable();
            $table->decimal('provision',18,2)->nullable();
            $table->integer('period')->nullable();
            $table->date('start_date')->nullable();
            $table->date('due_date')->nullable();
            $table->integer('loan_count')->nullable();
            $table->string('installment_system_code',4)->nullable();
            $table->string('interest_system_code',4)->nullable();
            $table->string('usage_type_code',5)->nullable();
            $table->string('loan_product_code')->nullable();
            $table->integer('quality_id')->nullable();
            $table->decimal('outstanding',18,2)->nullable();
            $table->decimal('loan_arrear',18,2)->nullable();
            $table->integer('loan_arrear_day')->nullable();
            $table->decimal('interest_arrear',18,2)->nullable();
            $table->integer('interest_arrear_day')->nullable();
            $table->decimal('penalty',18,2)->nullable();
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
        Schema::dropIfExists('loans');
    }
};

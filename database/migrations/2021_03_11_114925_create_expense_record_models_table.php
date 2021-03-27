<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseRecordModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_record_models', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->nullable();
            $table->string('expense_category')->nullable();
            $table->string('mother_company')->nullable();
            $table->string('expense_amount')->nullable();
            $table->string('expense_month')->nullable();
            $table->string('expense_status')->nullable();
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
        Schema::dropIfExists('expense_record_models');
    }
}

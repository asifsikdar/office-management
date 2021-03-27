<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomeMonthlyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_monthly_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->nullable();
            $table->string('income')->nullable();
            $table->string('income_month')->nullable();
            $table->string('income_status')->nullable();
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
        Schema::dropIfExists('income_monthly_reports');
    }
}

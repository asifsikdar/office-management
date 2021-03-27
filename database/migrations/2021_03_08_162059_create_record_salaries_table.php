<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_salaries', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->nullable();
            $table->string('payment')->nullable();
            $table->string('salary_month')->nullable();
            $table->string('salary_status')->nullable();
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
        Schema::dropIfExists('record_salaries');
    }
}

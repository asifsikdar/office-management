<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        // $active= SalaryModel::find($id);
        Schema::create('salary_models', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empid')->unique();
            $table->date('joindate')->nullable();
            $table->string('name');
            $table->string('designation');
            $table->string('bankname');
            $table->string('bankdetails')->unique();
            $table->string('salary_amount');
            $table->string('bonus')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('salary_models');
    }
}

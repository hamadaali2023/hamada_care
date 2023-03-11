<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_insurances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctorId');
            $table->foreign('doctorId')->references('id')->on('doctors')->onDelete('cascade');
            $table->unsignedBigInteger('companies_insuranceId');
            $table->foreign('companies_insuranceId')->references('id')->on('companies_insurances')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('number')->nullable();
            $table->string('date')->nullable();


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
        Schema::dropIfExists('doctor_insurances');
    }
}

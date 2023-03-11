<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_banks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctorId');
            $table->foreign('doctorId')->references('id')->on('doctors')->onDelete('cascade');
            $table->unsignedBigInteger('countryId');
            $table->foreign('countryId')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedBigInteger('cityId');
            $table->foreign('cityId')->references('id')->on('cities')->onDelete('cascade');

            $table->string('name_acount')->nullable();
            $table->string('name')->nullable();
            $table->string('number')->nullable();

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
        Schema::dropIfExists('doctor_banks');
    }
}

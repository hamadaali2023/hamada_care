<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_licenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctorId');
            $table->foreign('doctorId')->references('id')->on('doctors')->onDelete('cascade');
            $table->unsignedBigInteger('placeLicensesId');
            $table->foreign('placeLicensesId')->references('id')->on('placeissuancelicenses');
            $table->string('place')->nullable(); // مكان صدور الرخصه
            $table->string('num')->nullable();// الدرجه العلمية
            $table->string('name')->nullable();// اسم شركة التأمين
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('doctor_licenses');
    }
}

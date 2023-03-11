<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctorId');
            $table->foreign('doctorId')->references('id')->on('doctors')->onDelete('cascade');
            $table->text('file')->nullable();//شهادة ممارسة المهنه

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
        Schema::dropIfExists('doctor_certificates');
    }
}

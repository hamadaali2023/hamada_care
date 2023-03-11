<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_educations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctorId');
            $table->foreign('doctorId')->references('id')->on('doctors')->onDelete('cascade');
            $table->unsignedBigInteger('degreeId');
            $table->foreign('degreeId')->references('id')->on('degrees');
            $table->string('name')->nullable();
            $table->string('degree')->nullable();// الدرجه العلمية
            $table->string('speciality')->nullable();
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
        Schema::dropIfExists('doctor_educations');
    }
}

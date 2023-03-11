<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorExperiencesTable extends Migration
{
    
    public function up()
    {
        Schema::create('doctor_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctorId');
            $table->foreign('doctorId')->references('id')->on('doctors')->onDelete('cascade');
          
            $table->string('year')->nullable(); // عدد سنوات الخبره
            $table->string('organization')->nullable();// الدرجه العلمية
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('job_title')->nullable();
            $table->string('job_desc')->nullable();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('doctor_experiences');
    }
}

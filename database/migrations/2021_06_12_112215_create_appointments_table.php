<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctorId');
            $table->foreign('doctorId')->references('id')->on('doctors');
            $table->unsignedBigInteger('patientId');
            $table->foreign('patientId')->references('id')->on('patients');
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->integer('status')->default(1);
            $table->integer('amount')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('appointments');
    }
}

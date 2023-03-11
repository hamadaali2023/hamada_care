<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctorId');
            $table->foreign('doctorId')->references('id')->on('doctors');
            $table->unsignedBigInteger('patientId');
            $table->foreign('patientId')->references('id')->on('patients');
            $table->unsignedBigInteger('appointmentId');
            $table->foreign('appointmentId')->references('id')->on('appointments');
            $table->string('type')->nullable();
            $table->string('company')->nullable();
            $table->string('name')->nullable();
            $table->string('number')->nullable();
            $table->string('cvc')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
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
        Schema::dropIfExists('payments');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name_ar')->nullable();
            $table->string('last_name_ar')->nullable();
            $table->string('first_name_en')->nullable();
            $table->string('last_name_en')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile')->nullable();
            $table->text('photo')->nullable();
            $table->string('gender')->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->date('lastVisit')->nullable();
            $table->integer('status')->default(1);
            $table->integer('paid')->nullable();
            $table->text('token')->nullable();
            $table->text('device_token')->nullable();
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
        Schema::dropIfExists('patients');
    }
}

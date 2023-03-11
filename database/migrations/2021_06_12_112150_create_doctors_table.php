<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('countryId');
            $table->foreign('countryId')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedBigInteger('cityId');
            $table->foreign('cityId')->references('id')->on('cities')->onDelete('cascade');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();// المنطقه
            $table->string('gender')->nullable();
            $table->string('type')->nullable(); //نوع الاكونت شخصي ام ام منظمه
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('dateOfBirth')->nullable();
            $table->string('nationality')->nullable();
            $table->text('photo')->nullable(); 
            $table->string('personality_number')->nullable();
            $table->text('personality_photo')->nullable();  // الهوية 
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('doctors');
    }
}

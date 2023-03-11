<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('work_dayId');
            $table->foreign('work_dayId')->references('id')->on('work_days')->onDelete('cascade');
            $table->string('sat')->default(0);
            $table->string('sun')->default(0);
            $table->string('mon')->default(0);
            $table->string('tus')->default(0);
            $table->string('wed')->default(0);
            $table->string('thu')->default(0);
            $table->string('fri')->default(0);
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
        Schema::dropIfExists('days');
    }
}

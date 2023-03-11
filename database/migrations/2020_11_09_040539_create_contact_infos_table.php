<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();
            $table->text('logo')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address_ar')->nullable();
            $table->string('address_en')->nullable();
            $table->text('location')->nullable();
            $table->text('mesion_ar')->nullable();
            $table->text('mesion_en')->nullable();
            $table->text('mesion_image')->nullable();
            $table->text('vesion_ar')->nullable();
            $table->text('vesion_en')->nullable();
            $table->text('vesion_image')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->text('privacy_ar')->nullable();
            $table->text('privacy_en')->nullable();            
            
            $table->double('version')->nullable();
            $table->text('favicon')->nullable();
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
        Schema::dropIfExists('contact_infos');
    }
}

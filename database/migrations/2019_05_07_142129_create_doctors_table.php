<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('registration_status')->default('pending');
            $table->string('submit_status')->default('pending');
            $table->string('contact')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('address')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('certificate')->nullable();
            $table->string('image')->nullable();
            $table->integer('experience')->nullable();
            $table->integer('rating')->default('0');
            $table->integer('category')->nullable();
            $table->string('gender')->nullable();
            $table->string('cur_work')->nullable();
            $table->string('prev_work')->nullable();
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

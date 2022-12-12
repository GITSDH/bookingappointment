<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('nationality');
            $table->string('gender');
            $table->string('photo');
            $table->string('language');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('slot_id');
            $table->unsignedBigInteger('hospital_id');
            $table->unsignedBigInteger('speciality_id');
            $table->unsignedBigInteger('subscription_id');
            $table->foreign('slot_id')->references('id')->on('slots')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('hospital_id')->references('id')->on('hospitals')->onDelete('cascade');
            $table->foreign('speciality_id')->references('id')->on('specialities')->onDelete('cascade');
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');
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
};
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
        Schema::create('appoinments', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->time('requested_time')->nullable();
            $table->time('accepted_time')->nullable();
            $table->time('performed_time')->nullable();
            $table->string('pescription')->nullable();
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('speciality_id');
            $table->foreign('speciality_id')->references('id')->on('specialities')->onDelete('cascade');
            $table->unsignedBigInteger('hospital_id');
            $table->foreign('hospital_id')->references('id')->on('hospitals')->onDelete('cascade');
            $table->unsignedBigInteger('slot_id');
            $table->foreign('slot_id')->references('id')->on('slots')->onDelete('cascade');
            $table->tinyInteger('status')->default(1)->comment('1=>Pending,2=>Confirmed,3=>Completed,4=>Rejected');
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
        Schema::dropIfExists('appoinments');
    }
};
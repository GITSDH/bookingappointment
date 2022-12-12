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
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('subscription_id');
            $table->unsignedTinyInteger('type')->default(1)->comment('1=>Clinic,2=>Hospital');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
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
        Schema::dropIfExists('hospitals');

  }
};
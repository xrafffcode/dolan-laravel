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
        Schema::create('transaction_tours', function (Blueprint $table) {
            $table->id();

            $table->integer('tour_id');
            $table->integer('users_id');
            $table->string('transaction_code');
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->date('date');
            $table->integer('people');
            $table->integer('transaction_total');
            $table->string('transaction_status');

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
        Schema::dropIfExists('transaction_tours');
    }
};

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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');
            $table->string('description');
            $table->string('rating');
            $table->string('city');
            $table->string('area');
            $table->string('country');
            $table->string('price');
            $table->integer('restaurant');
            $table->integer('wifi');
            $table->integer('elevator');
            $table->integer('breakfast');
            $table->integer('parking');
            $table->integer('laundry');

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
        Schema::dropIfExists('hotels');
    }
};

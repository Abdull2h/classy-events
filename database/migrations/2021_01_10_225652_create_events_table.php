<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->Date('date');
            $table->Time('time');
            $table->string('location');
            $table->string('image');
            $table->text('description');
            $table->unsignedBigInteger('owner');
            $table->unsignedBigInteger('doorman')->nullable();

            $table->timestamps();

            $table->foreign('owner')->references('user_id')->on('hosts');
            $table->foreign('doorman')->references('user_id')->on('doormen');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}

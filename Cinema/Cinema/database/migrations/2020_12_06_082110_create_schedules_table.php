<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id');
                $table->foreign('movie_id')->references('id')->on('movies');
             $table->unsignedBigInteger('day_id');
                $table->foreign('day_id')->references('id')->on('days');   
             $table->integer('hall_number');
             $table->time('time');
                $table->double('price');
            $table->boolean('finished');
            $table->json('places');
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
        Schema::dropIfExists('schedules');
    }
}

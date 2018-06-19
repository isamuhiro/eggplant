<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes_points', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('end_point');
            $table->integer('stores_id')->unsigned()->nullable();
            $table->foreign('stores_id')->references('id')->on('stores');
            $table->integer('os_id')->unsigned()->nullable();
            $table->foreign('os_id')->references('id')->on('os');
            $table->integer('routes_id')->unsigned()->nullable();
            $table->foreign('routes_id')->references('id')->on('routes');
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
        Schema::dropIfExists('routes_points');
    }
}

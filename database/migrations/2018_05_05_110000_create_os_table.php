<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('os', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->char('status', 1);
            $table->float('total');
            $table->integer('managers_id')->unsigned()->nullable();
            $table->foreign('managers_id')->references('id')->on('managers');
            $table->integer('stores_id')->unsigned()->nullable();
            $table->foreign('stores_id')->references('id')->on('stores');
            $table->integer('clients_id')->unsigned()->nullable();
            $table->foreign('clients_id')->references('id')->on('clients');
            $table->integer('drivers_id')->unsigned()->nullable();
            $table->foreign('drivers_id')->references('id')->on('drivers');
            $table->integer('routes_id')->unsigned()->nullable();
            $table->foreign('routes_id')->references('id')->on('routes');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('os');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFighter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fighter', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('lastName');
            $table->string('alias');
            $table->float('height');
            $table->float('weight');
            $table->integer('fk_category');
            $table->foreign('fk_category')->references('id')->on('category');
            $table->string('address');
            $table->string('fk_city');
            $table->foreign('fk_city')->references('id')->on('city');
            $table->integer('wins');
            $table->integer('ties');
            $table->integer('defeats');
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
        Schema::dropIfExists('fighter');
    }
}

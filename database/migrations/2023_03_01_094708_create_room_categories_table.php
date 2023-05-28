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
        Schema::create('room_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('price_per_night');
            $table->integer('children_ability');
            $table->integer('max_occupancy');
            $table->text('general');
            $table->text('furniture');
            $table->text('bathroom');
            $table->text('technique');
            $table->text('security');
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
        Schema::dropIfExists('room_categories');
    }
};

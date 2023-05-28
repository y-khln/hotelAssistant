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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('login',255)->nullable(false)->unique('login');
            $table->string('password',255)->nullable(false);
            $table->string('name');
            $table->string('surname');
            $table->string('patronymic')->nullable(true);
            $table->date('date_of_birth');
            $table->string('phone')->unique();
            $table->string('email');
            $table->integer('passport_id');
            $table->integer('passport_series');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',8);
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('gender');
            $table->date('birthday');
            $table->integer('height');
            $table->integer('weight');
            $table->integer('nationality');
            $table->integer('city');
            $table->integer('degree');
            $table->integer('careerclass');
            $table->string('career', 50);
            $table->string('introduction', 255);
            $table->string('ideal', 150);
            $table->integer('hitpoint');
            $table->string('image');
            $table->integer('permissions');
            $table->date('releasedate');
            $table->string('activation_code');
            $table->integer('actived')->default(0);
            $table->date('activated_at');
            $table->rememberToken();
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('users');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

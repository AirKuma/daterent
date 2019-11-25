<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentusers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('rent_id')->unsigned();

            $table->foreign('rent_id')
                    ->references('id')
                    ->on('rents')
                    ->onDelete('cascade'); 

            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rentusers');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fee');
            $table->integer('requestgender');
            $table->string('phone',20);
            $table->string('facebook');
            $table->string('youtube');
            $table->string('line');
            $table->string('telegram');
            $table->string('wechat');
            $table->string('Whatsapp');
            $table->string('web');
            $table->integer('haschild');
            $table->string('motto',50);
            $table->string('serviceaddress',150);
            $table->string('servicetime',150);
            $table->string('language',150);
            $table->integer('bust');
            $table->integer('waistline');
            $table->integer('hips');
            $table->integer('ifrent');
            $table->date('releasedate');
            $table->timestamps();

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
        Schema::drop('rents');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSpot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spots', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->string('title', 100);
            $table->longText('description');
            $table->longText('address');
            $table->string('locality', 50);
            $table->string('reagion', 50);
            $table->string('postcode', 20);
            $table->string('country', 2);
            $table->float('lat', 10, 6);
            $table->float('lng', 10, 6);
            $table->integer('votes');
            $table->integer('hearts');
            $table->double('rating', 2, 1)->unsigned();
            $table->integer('creator_id')->unsigned();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->integer('updater_id')->unsigned();
            $table->foreign('updater_id')->references('id')->on('users');
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
        Schema::drop('spots');
    }
}

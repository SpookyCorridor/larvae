<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->unsigned()->index();
            $table->integer('count')->unsigned(); 
            $table->timestamps();
        });

        Schema::create('favorite_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            $table->integer('favorite_id')->unsigned()->index();

            $table->foreign('user_id')->references('id')
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
        Schema::drop('favorites');
        Schema::drop('favorite_user');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title');
            $table->string('excerpt')->nullable();
            $table->text('body');
            $table->string('image')->nullable();
            $table->boolean('published')->nullable();
            $table->boolean('featured')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('site_id');

            $table->foreign('site_id')
                ->references('id')
                ->on('sites')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}

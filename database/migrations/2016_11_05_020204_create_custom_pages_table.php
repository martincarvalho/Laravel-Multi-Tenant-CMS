<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('description_title')->nullable();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('link')->nullable();
            $table->string('tag')->nullable();
            $table->string('image')->nullable();
            $table->text('body')->nullable();
            $table->text('extra_1')->nullable();
            $table->text('extra_2')->nullable();
            $table->text('extra_3')->nullable();
            $table->integer('area_id');

            $table->foreign('area_id')
                ->references('id')
                ->on('areas')
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
        Schema::dropIfExists('custom_pages');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->unique();
            $table->boolean('has_title')->nullable();
            $table->boolean('has_subtitle')->nullable();
            $table->boolean('has_link')->nullable();
            $table->boolean('has_tag')->nullable();
            $table->boolean('has_image')->nullable();
            $table->boolean('has_body')->nullable();
            $table->boolean('has_extra_1')->nullable();
            $table->boolean('has_extra_2')->nullable();
            $table->boolean('has_extra_3')->nullable();

            $table->integer('site_id');

            $table->foreign('site_id')
                ->references('id')
                ->on('sites')
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
        Schema::dropIfExists('areas');
    }
}

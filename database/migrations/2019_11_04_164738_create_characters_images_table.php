<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->timestamps();

            $table->unsignedInteger('character_id');

            $table->foreign('character_id')
                ->references('id')->on('characters')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters_images');
    }
}

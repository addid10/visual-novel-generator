<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dialogue_number');
            $table->longText('dialogue');
            $table->timestamps();

            $table->unsignedInteger('visual_novel_id');
            $table->unsignedInteger('character_image_id');
            $table->unsignedInteger('background_id');
            $table->unsignedInteger('music_id');

            $table->foreign('visual_novel_id')
                ->references('id')->on('visual_novels')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('character_image_id')
                ->references('id')->on('characters_images')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('background_id')
                ->references('id')->on('backgrounds')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('music_id')
                ->references('id')->on('musics')
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
        Schema::dropIfExists('stories');
    }
}

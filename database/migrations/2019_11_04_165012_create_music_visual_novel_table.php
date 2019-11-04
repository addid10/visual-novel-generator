<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicVisualNovelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music_visual_novel', function (Blueprint $table) {
            $table->unsignedInteger('visual_novel_id');
            $table->unsignedInteger('music_id');

            $table->foreign('visual_novel_id')
                ->references('id')->on('visual_novels')
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
        Schema::dropIfExists('music_visual_novel');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenreVisualNovelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre_visual_novel', function (Blueprint $table) {
            $table->unsignedInteger('visual_novel_id');
            $table->unsignedInteger('genre_id');

            $table->foreign('visual_novel_id')
                ->references('id')->on('visual_novels')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('genre_id')
                ->references('id')->on('genres')
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
        Schema::dropIfExists('genre_visual_novel');
    }
}

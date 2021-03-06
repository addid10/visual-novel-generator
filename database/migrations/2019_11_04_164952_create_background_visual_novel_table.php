<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBackgroundVisualNovelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('background_visual_novel', function (Blueprint $table) {
            $table->unsignedInteger('visual_novel_id');
            $table->unsignedInteger('background_id');

            $table->foreign('visual_novel_id')
                ->references('id')->on('visual_novels')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('background_id')
                ->references('id')->on('backgrounds')
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
        Schema::dropIfExists('background_visual_novel');
    }
}

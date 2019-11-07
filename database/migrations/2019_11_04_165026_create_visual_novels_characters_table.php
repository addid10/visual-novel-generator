<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisualNovelsCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visual_novels_characters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('visual_novel_id');
            $table->unsignedInteger('character_id');
            $table->unsignedInteger('character_role_id');

            $table->foreign('visual_novel_id')
                ->references('id')->on('visual_novels')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('character_id')
                ->references('id')->on('characters')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('character_role_id')
                ->references('id')->on('character_roles')
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
        Schema::dropIfExists('visual_novels_characters');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVisualNovelIdToSaveDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('save_datas', function (Blueprint $table) {
            $table->unsignedInteger('visual_novel_id');

            $table->foreign('visual_novel_id')
                ->references('id')->on('visual_novels')
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
        Schema::table('save_datas', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Database\Seeder;

class MusicVisualNovelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('music_visual_novel')->get()->count() == 0) {
            DB::table('music_visual_novel')->insert([
                [
                    'music_id' => '1',
                    'visual_novel_id' => '1',
                ],
                [
                    'music_id' => '2',
                    'visual_novel_id' => '1',
                ],
            ]);
        }
    }
}

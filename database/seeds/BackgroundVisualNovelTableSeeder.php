<?php

use Illuminate\Database\Seeder;

class BackgroundVisualNovelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('background_visual_novel')->get()->count() == 0) {
            DB::table('background_visual_novel')->insert([
                [
                    'background_id' => '1',
                    'visual_novel_id' => '1',
                ],
                [
                    'background_id' => '2',
                    'visual_novel_id' => '1',
                ],
            ]);
        }
    }
}

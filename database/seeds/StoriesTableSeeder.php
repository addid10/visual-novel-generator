<?php

use Illuminate\Database\Seeder;

class StoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('stories')->get()->count() == 0) {
            DB::table('stories')->insert([
                [
                    'dialogue_number' => 1,
                    'dialogue' => 'Tes',
                    'visual_novel_id' => 1,
                    'character_image_id' => 1,
                    'background_id' => 1,
                    'music_id' => null,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'dialogue_number' => 2,
                    'dialogue' => 'Hello World',
                    'visual_novel_id' => 1,
                    'character_image_id' => 2,
                    'background_id' => 1,
                    'music_id' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ]);
        }
    }
}

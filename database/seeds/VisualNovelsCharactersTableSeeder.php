<?php

use Illuminate\Database\Seeder;

class VisualNovelsCharactersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('visual_novels_characters')->get()->count() == 0) {
            DB::table('visual_novels_characters')->insert([
                [
                    'character_id' => '1',
                    'character_role_id' => '1',
                    'visual_novel_id' => '1',
                ],
                [
                    'character_id' => '2',
                    'character_role_id' => '3',
                    'visual_novel_id' => '1',
                ],
            ]);
        }
    }
}

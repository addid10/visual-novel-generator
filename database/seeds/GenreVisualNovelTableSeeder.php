<?php

use Illuminate\Database\Seeder;

class GenreVisualNovelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('genre_visual_novel')->get()->count() == 0) {
            DB::table('genre_visual_novel')->insert([
                [
                    'genre_id' => '1',
                    'visual_novel_id' => '1',
                ],
                [
                    'genre_id' => '2',
                    'visual_novel_id' => '1',
                ],
                [
                    'genre_id' => '3',
                    'visual_novel_id' => '1',
                ],
            ]);
        }
    }
}

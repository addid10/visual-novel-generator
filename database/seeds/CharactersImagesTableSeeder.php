<?php

use Illuminate\Database\Seeder;

class CharactersImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('characters_images')->get()->count() == 0) {
            DB::table('characters_images')->insert([
                [
                    'image' => 'characters/Fendy.png',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'character_id' => '2',
                ],
                [
                    'image' => 'characters/Kagami.png',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'character_id' => '1',
                ],
                [
                    'image' => 'characters/Kagami-smile.png',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'character_id' => '1',
                ]
            ]);
        }
    }
}

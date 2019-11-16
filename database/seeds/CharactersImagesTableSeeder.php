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
                    'image' => 'characters/Fendy_1573719379_5dcd0d539a94d',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'character_id' => '2',
                ],
                [
                    'image' => 'characters/Kagami_1573719364_5dcd0d44d2f26',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'character_id' => '1',
                ],
                [
                    'image' => 'characters/Kagami_1573719365_5dcd0d4514cf0',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'character_id' => '1',
                ]
            ]);
        }
    }
}

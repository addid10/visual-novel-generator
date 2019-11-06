<?php

use Illuminate\Database\Seeder;

class VisualNovelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('visual_novels')->get()->count() == 0) {
            DB::table('visual_novels')->insert([
                [
                    'title' => 'GSA Visual Novel',
                    'synopsis' => 'Hehe',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'user_id' => '1',
                ],
            ]);
        }
    }
}

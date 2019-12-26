<?php

use Illuminate\Database\Seeder;

class BackgroundsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('backgrounds')->get()->count() == 0) {
            DB::table('backgrounds')->insert([
                [
                    'name' => 'BG-School-1',
                    'image' => 'backgrounds/BG-School-1_1573719315_5dcd0d13b9951',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'BG-School-2',
                    'image' => 'backgrounds/BG-School-2_1573719329_5dcd0d2139597',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            ]);
        }
    }
}

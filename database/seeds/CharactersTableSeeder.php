<?php

use Illuminate\Database\Seeder;

class CharactersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('characters')->get()->count() == 0) {
            DB::table('characters')->insert([
                [
                    'fullname' => 'Kagami Hirotou',
                    'nickname' => 'Kagami',
                    'gender' => 'Male',
                    'description' => 'SHSL Informan',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'fullname' => 'Fendy Pradana',
                    'nickname' => 'Fendy',
                    'gender' => 'Male',
                    'description' => 'SHSL Rider',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ]);
        }
    }
}

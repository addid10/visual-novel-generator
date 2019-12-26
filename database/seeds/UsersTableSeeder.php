<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('users')->get()->count() == 0) {
            DB::table('users')->insert([
                [
                    'user_name' => 'creator',
                    'name' => 'Creator',
                    'email' => 'creator@oke.com',
                    'password' => bcrypt(12345),
                    'phone_number' => '123456789',
                    'gender' => 'Male',
                    'image_profile' => null,
                    'remember_token' => Str::random(10),
                    'role_id' =>  1,
                ],
            ]);
        }
    }
}

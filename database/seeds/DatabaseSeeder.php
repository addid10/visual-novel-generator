<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CharacterRolesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(VisualNovelsTableSeeder::class);
        $this->call(CharactersTableSeeder::class);
        $this->call(BackgroundsTableSeeder::class);
        $this->call(MusicsTableSeeder::class);
    }
}

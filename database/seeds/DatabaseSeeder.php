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
        factory(App\User::class, 5)->create();
        $this->call(GenresTableSeeder::class);
        $this->call(VisualNovelsTableSeeder::class);
        $this->call(CharactersTableSeeder::class);
        $this->call(CharactersImagesTableSeeder::class);
        $this->call(CharacterVisualNovelTableSeeder::class);
        $this->call(BackgroundsTableSeeder::class);
        $this->call(BackgroundVisualNovelTableSeeder::class);
        $this->call(MusicsTableSeeder::class);
        $this->call(MusicVisualNovelTableSeeder::class);
    }
}

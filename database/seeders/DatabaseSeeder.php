<?php

namespace Database\Seeders;

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
        // \App\Models\Rayon::factory(1)->create();
        \App\Models\Admin::factory(1)->create();
        // \App\Models\User::factory(3)->create();
        $this->call([
            LevelSeeder::class,
            RoleSeeder::class,
        ]);
    }
}

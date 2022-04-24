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
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            LevelSeeder::class,
            JobTypeSeeder::class,
            ModuleSeeder::class,
            PermissionSeeder::class,
            LocationSeeder::class,

        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('modules')->insert([
            0 => [
                'title' => 'Role Management',
                'status' => 1,
                'slug' => 'role'
            ],
            1 => [
                'title' => 'User Management',
                'status' => 1,
                'slug' => 'user'
            ],

        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            0 => ['title' => 'Super Admin',  'status' => 1],
            1 => ['title' => 'Admin',  'status' => 1],
            2 => ['title' => 'Editor',  'status' => 1],
        ]);
    }
}

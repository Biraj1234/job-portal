<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('permissions')->insert([
            0 => [
                'title' => 'Create Role',
                'module_id' => 1,
                'route' => 'backend.role.create'
            ],
            1 => [
                'title' => 'List Role',
                'module_id' => 1,
                'route' => 'backend.role.index'
            ],
            2 => [
                'title' => 'Delete Role',
                'module_id' => 1,
                'route' => 'backend.role.destroy'
            ],
            3 => [
                'title' => 'Create User',
                'module_id' => 2,
                'route' => 'backend.user.create'

            ],
            4 => [
                'title' => 'Assign User',
                'module_id' => 2,
                'route' => 'role.assign'
            ],


        ]);
    }
}

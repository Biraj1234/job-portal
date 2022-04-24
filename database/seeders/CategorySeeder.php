<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->insert([
            0 => [
                'title' => 'Architecture/Interior Designing',
                'icon' => 'fas fa-drafting-compass',
                'status' => 1,
                'slug' => 'archid-design'
            ],
            1 => [
                'title' => 'Teaching/Education',
                'icon' => 'fas fa-chalkboard-teacher',
                'status' => 1,
                'slug' => 'architecture-interior'
            ],
            2 => [
                'title' => 'IT & Telecomunication',
                'icon' => 'fas fa-laptop-code',
                'status' => 1,
                'slug' => 'information-tech'
            ],

            3 => [
                'title' => 'General Mgmt. / Administration / Operations',
                'icon' => 'fas fa-cog',
                'status' => 1,
                'slug' => 'general-management-adminstration-operation'
            ],


        ]);
    }
}

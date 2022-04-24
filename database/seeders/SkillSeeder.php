<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_skills')->insert([
            0 => [
                'name' => 'HTMl',
                'status' => 1,
                'slug' => 'html',
            ],
            1 => [
                'name' => 'CSS',
                'status' => 1,
                'slug' => 'css',
            ],

            2 => [
                'name' => 'Communication',
                'status' => 1,
                'slug' => 'communication',
            ],

            3 => [
                'name' => 'Php',
                'status' => 1,
                'slug' => 'php',
            ],

            4 => [
                'name' => 'Javascript',
                'status' => 1,
                'slug' => 'js',
            ],

            5 => [
                'name' => 'UI/UX',
                'status' => 1,
                'slug' => 'ui-ux',
            ],
            6 => [
                'name' => 'Git',
                'status' => 1,
                'slug' => 'git',
            ],
            7 => [
                'name' => 'Laravel',
                'status' => 1,
                'slug' => 'laravel',
            ],


        ]);
    }
}

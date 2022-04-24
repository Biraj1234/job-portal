<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('job_levels')->insert([
            0 => [
                'title' => 'Senior Level',
                'status' => 1,
                'slug' => 'senior'
            ],
            1 => [
                'title' => 'Mid Level',
                'status' => 1,
                'slug' => 'mid'
            ],
            2 => [
                'title' => 'Junior Level',
                'status' => 1,
                'slug' => 'junior'
            ],


        ]);
    }
}

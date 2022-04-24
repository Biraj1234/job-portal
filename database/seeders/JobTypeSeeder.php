<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('job_types')->insert([
            0 => [
                'title' => 'Full Time',
                'status' => 1,
                'slug' => 'full'
            ],
            1 => [
                'title' => 'Part Time',
                'status' => 1,
                'slug' => 'part'
            ],


        ]);
    }
}

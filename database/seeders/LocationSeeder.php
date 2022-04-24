<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            0 => [
                'name' => 'Kathmandu',
                'status' => 1,
                'slug' => 'ktm',
            ],
            1 => [
                'name' => 'Lalitpur',
                'status' => 1,
                'slug' => 'ltpr',
            ],

            2 => [
                'name' => 'Bhaktapur',
                'status' => 1,
                'slug' => 'bkt',
            ],


        ]);
    }
}

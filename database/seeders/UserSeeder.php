<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            0 => [
                'name' => 'Biraj Shrestha',
                'email' => 'birajshrestha51@gmail.com',
                'phone' => '9844390741',
                'username' => 'biraj_shrestha',
                'password' => Hash::make('biraj123'),
                'role_id' => 1,
                'status' => 1,
                'address' => 'Koteshwor, Kathmandu',
            ],

        ]);
    }
}

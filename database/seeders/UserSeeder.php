<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'first_name' => 'Rakibul',
            'middle_name' => '',
            'last_name' => 'Islam',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Hashed password
            'role' => 'global_admin',
            'status' => 1,
            'phone_number' => '01111111111',
            'address' => 'Airport,DHaka,Bangladesh',
            'profile_picture' => null,
            'activation_token' => null,
            'remember_token' => null,
            'two_factor_auth' => 0,
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Rakibul',
            'middle_name' => '',
            'last_name' => 'Islam',
            'email' => 'user@example.com',
            'password' => Hash::make('password'), // Hashed password
            'role' => 'customer',
            'status' => 1,
            'phone_number' => '01111111111',
            'address' => 'Airport,DHaka,Bangladesh',
            'profile_picture' => null,
            'activation_token' => null,
            'remember_token' => null,
            'two_factor_auth' => 0,
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'first_name' => 'Rakibul',
            'middle_name' => '',
            'last_name' => 'Islam',
            'email' => 'rider@example.com',
            'password' => Hash::make('password'), // Hashed password
            'role' => 'rider',
            'status' => 1,
            'phone_number' => '01111111111',
            'address' => 'Airport,DHaka,Bangladesh',
            'profile_picture' => null,
            'activation_token' => null,
            'remember_token' => null,
            'two_factor_auth' => 0,
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}


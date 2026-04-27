<?php

namespace Database\Seeders;

use App\Models\OrderSettings;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        OrderSettings::create([
            'price_per_floor' => 10,
            'distance_limit_in_floor' => '10',
        ]);
        $this->call([
            AddressSeeder::class,
            CompanyAddressSeeder::class,
            CompanyWorkingHoursSeeder::class,
            CountrySeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            MenuSeeder::class,
        ]);
    }
}

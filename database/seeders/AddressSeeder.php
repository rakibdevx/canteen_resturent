<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;
use Carbon\Carbon;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::create([
            'user_id'     => 3,
            'label'       => 'delivery',
            'street'      => 'House 12, Road 5, Dhanmondi',
            'city'        => 'Dhaka',
            'state'       => 'Dhaka',
            'postal_code' => '1205',
            'country'     => 'Bangladesh',
            'is_default'  => true,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);

        Address::create([
            'user_id'     => 3,
            'label'       => 'delivery',
            'street'      => 'House 45, Road 10, Uttara Sector 7',
            'city'        => 'Dhaka',
            'state'       => 'Dhaka',
            'postal_code' => '1230',
            'country'     => 'Bangladesh',
            'is_default'  => false,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
    }
}


//php artisan db:seed --class=AddressSeeder

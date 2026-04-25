<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyAddress;

class CompanyAddressSeeder extends Seeder
{
    public function run(): void
    {
        $addresses = [
            [
                'street'       => 'House 12, Road 5, Dhanmondi',
                'city'         => 'Dhaka',
                'state'        => 'Dhaka',
                'postal_code'  => '1205',
                'country'      => 'Bangladesh',
                'latitude'     => 23.746466,
                'longitude'    => 90.376015,
            ],
            [
                'street'       => 'House 45, Road 10, Uttara Sector 7',
                'city'         => 'Dhaka',
                'state'        => 'Dhaka',
                'postal_code'  => '1230',
                'country'      => 'Bangladesh',
                'latitude'     => 23.875900,
                'longitude'    => 90.379500,
            ]
        ];
        foreach ($addresses as $address) {
            CompanyAddress::updateOrCreate(
                [
                    'street'      => $address['street'],
                    'postal_code' => $address['postal_code'],
                ],
                $address
            );
        }
    }
}


// php artisan db:seed --class=CompanyAddressSeeder

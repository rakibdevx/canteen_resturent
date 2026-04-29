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
                'street'       => '11/2 Kawlar Jame Mosjid Road, Ashkona,(Near Hajj Camp) Dakshinkhan',
                'city'         => 'Dhaka',
                'state'        => 'Dhaka',
                'postal_code'  => '1230',
                'country'      => 'Bangladesh',
                'latitude'     => 23.746466,
                'longitude'    => 90.376015,
            ],
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

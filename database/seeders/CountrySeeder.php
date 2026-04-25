<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    public function run(): void
        {
            $data = [
        [
            'name'            => 'Bangladesh',
            'iso_code'        => 'BD',
            'currency_code'   => 'BDT',
            'currency_symbol' => '৳',
        ],
        [
            'name'            => 'United States',
            'iso_code'        => 'US',
            'currency_code'   => 'USD',
            'currency_symbol' => '$',
        ]
    ];

        foreach ($data as $row) {
            Country::updateOrCreate(
                ['iso_code' => $row['iso_code']],
                $row
            );
        }
    }
}

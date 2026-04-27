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
        $buildings = ['Main Building', 'Second Building'];

        foreach ($buildings as $building) {
            for ($floor = 1; $floor <= 5; $floor++) {
                for ($room = 1; $room <= 20; $room++) {

                    $roomNumber = $floor . str_pad($room, 2, '0', STR_PAD_LEFT); // 101, 102...

                    Address::create([
                        'label'         => 'delivery',
                        'building_name' => $building,
                        'floor'         => $floor,
                        'room_no'       => $roomNumber,
                        'department'    => 'CSE',
                        'campus'        => 'Main Campus',
                        'notes'         => null,
                        'is_default'    => false,
                        'created_at'    => now(),
                        'updated_at'    => now(),
                    ]);
                }
            }
        }

        // 👉 Default address (optional)
        Address::first()->update([
            'is_default' => true
        ]);
    }
}


//php artisan db:seed --class=AddressSeeder

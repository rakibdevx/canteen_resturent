<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Rice Items',
                'description' => 'All types of rice and biryani items',
            ],
            [
                'name' => 'Curry Items',
                'description' => 'Beef, chicken, fish and vegetable curries',
            ],
            [
                'name' => 'Fried Rice & Khichuri',
                'description' => 'Fried rice, khichuri and mixed rice dishes',
            ],
            [
                'name' => 'Fast Food',
                'description' => 'Burger, fries, nuggets and modern fast food',
            ],
            [
                'name' => 'Snacks',
                'description' => 'Pizza, shawarma, sandwich and light snacks',
            ],
            [
                'name' => 'Breakfast',
                'description' => 'Paratha, roti, luchi and morning items',
            ],
            [
                'name' => 'Street Food',
                'description' => 'Fuchka, chotpoti, jhalmuri and street items',
            ],
            [
                'name' => 'Grill & BBQ',
                'description' => 'Kabab, tandoori and grilled items',
            ],
            [
                'name' => 'Desserts',
                'description' => 'Sweet dishes like halwa, pitha, ice cream',
            ],
            [
                'name' => 'Drinks',
                'description' => 'Soft drinks, juice and beverages',
            ],
        ];

        foreach ($data as $row) {
        Category::updateOrCreate(
            ['name' => $row['name']]
        );
    }
    }
}

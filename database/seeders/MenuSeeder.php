<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Kacchi Biryani', 'description' => 'Traditional mutton kacchi biryani', 'price' => 350, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 1],
            ['name' => 'Chicken Biryani', 'description' => 'Spicy chicken biryani', 'price' => 220, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 1],
            ['name' => 'Beef Tehari', 'description' => 'Dhaka style tehari', 'price' => 200, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 1],
            ['name' => 'Morog Polao', 'description' => 'Chicken polao special', 'price' => 250, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 1],
            ['name' => 'Plain Rice', 'description' => 'Steamed rice', 'price' => 60, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 1],

            ['name' => 'Beef Curry', 'description' => 'Spicy beef curry', 'price' => 180, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 2],
            ['name' => 'Chicken Curry', 'description' => 'Homemade chicken curry', 'price' => 150, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 2],
            ['name' => 'Fish Curry', 'description' => 'Hilsha fish curry', 'price' => 260, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 2],
            ['name' => 'Egg Curry', 'description' => 'Spicy egg curry', 'price' => 90, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 2],
            ['name' => 'Vegetable Curry', 'description' => 'Mixed vegetable curry', 'price' => 100, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 2],

            ['name' => 'Chicken Fried Rice', 'description' => 'Chinese style fried rice', 'price' => 160, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 3],
            ['name' => 'Egg Fried Rice', 'description' => 'Simple egg fried rice', 'price' => 120, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 3],
            ['name' => 'Vegetable Khichuri', 'description' => 'Healthy khichuri', 'price' => 110, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 3],
            ['name' => 'Beef Khichuri', 'description' => 'Beef mixed khichuri', 'price' => 180, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 3],
            ['name' => 'Plain Khichuri', 'description' => 'Simple khichuri', 'price' => 90, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 3],

            ['name' => 'Beef Burger', 'description' => 'Cheesy beef burger', 'price' => 180, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 4],
            ['name' => 'Chicken Burger', 'description' => 'Crispy chicken burger', 'price' => 150, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 4],
            ['name' => 'Cheese Burger', 'description' => 'Extra cheese burger', 'price' => 200, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 4],
            ['name' => 'French Fries', 'description' => 'Crispy fries', 'price' => 80, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 4],
            ['name' => 'Chicken Nuggets', 'description' => 'Crunchy nuggets', 'price' => 140, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 4],

            ['name' => 'Shawarma', 'description' => 'Chicken shawarma roll', 'price' => 120, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 5],
            ['name' => 'Pizza Small', 'description' => 'Cheese pizza', 'price' => 300, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 5],
            ['name' => 'Momo', 'description' => 'Chicken momo', 'price' => 100, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 5],
            ['name' => 'Sandwich', 'description' => 'Veg sandwich', 'price' => 90, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 5],
            ['name' => 'Hot Dog', 'description' => 'Chicken hot dog', 'price' => 130, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 5],

            ['name' => 'Paratha Egg', 'description' => 'Egg paratha breakfast', 'price' => 70, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 6],
            ['name' => 'Roti Curry', 'description' => 'Roti with curry', 'price' => 80, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 6],
            ['name' => 'Luchi', 'description' => 'Soft luchi', 'price' => 50, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 6],
            ['name' => 'Halwa', 'description' => 'Sweet halwa', 'price' => 60, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 6],
            ['name' => 'Chotpoti', 'description' => 'Street chotpoti', 'price' => 60, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 7],

            ['name' => 'Fuchka', 'description' => 'Spicy fuchka', 'price' => 50, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 7],
            ['name' => 'Jhalmuri', 'description' => 'Spicy puffed rice', 'price' => 40, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 7],
            ['name' => 'Samosa', 'description' => 'Crispy samosa', 'price' => 30, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 7],
            ['name' => 'Singara', 'description' => 'Potato singara', 'price' => 25, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 7],
            ['name' => 'Pitha', 'description' => 'Traditional pitha', 'price' => 70, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 7],

            // remaining items to complete 50
            ['name' => 'Beef Kabab', 'description' => 'Grilled beef kabab', 'price' => 200, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 2],
            ['name' => 'Chicken Kabab', 'description' => 'Grilled chicken kabab', 'price' => 180, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 2],
            ['name' => 'Tandoori Chicken', 'description' => 'Spicy tandoori chicken', 'price' => 240, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 2],
            ['name' => 'Chicken Wings', 'description' => 'Hot spicy wings', 'price' => 170, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 4],
            ['name' => 'Ice Cream', 'description' => 'Vanilla ice cream', 'price' => 80, 'image' => 'menus/1777114106-Chocolate-Baklava-400x400.png', 'category_id' => 5],
        ];

        foreach ($data as $row) {
            Menu::updateOrCreate(
                [
                    'name' => $row['name'],
                ],
                [
                    'description' => $row['description'],
                    'price' => $row['price'],
                    'image' => $row['image'],
                    'category_id' => $row['category_id'],
                ]
            );
        }
    }
}

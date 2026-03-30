<?php

namespace Database\Seeders;

use App\Models\LostItem;
use Illuminate\Database\Seeder;

class LostItemSeeder extends Seeder
{
    public function run(): void
    {
        LostItem::create([
            'item_name' => 'Wireless Mouse',
            'description' => 'Black Logitech wireless mouse with blue LED',
            'category' => 'Electronics',
            'location_found' => 'Library Computer Lab',
            'date_found' => '2024-10-01',
            'unclaimed' => true,
        ]);

        LostItem::create([
            'item_name' => 'Black Water Bottle',
            'description' => 'Stanley stainless steel bottle, 1L capacity',
            'category' => 'Personal Items',
            'location_found' => 'Cafeteria Table 5',
            'date_found' => '2024-10-02',
            'unclaimed' => true,
        ]);

        LostItem::create([
            'item_name' => 'Blue Hoodie',
            'description' => 'Campus store hoodie size M',
            'category' => 'Clothing',
            'location_found' => 'Lecture Hall 101',
            'date_found' => '2024-10-03',
            'unclaimed' => false,
        ]);
    }
}
?>

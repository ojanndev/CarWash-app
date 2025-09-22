<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inventory;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inventory::create([
            'name' => 'Car Shampoo',
            'description' => 'High-quality car shampoo for exterior cleaning',
            'category' => 'Cleaning Supplies',
            'quantity' => 50,
            'reorder_level' => 10,
            'unit_price' => 25000,
            'supplier' => 'AutoCare Supplies Co.',
            'last_restocked' => '2025-09-01'
        ]);

        Inventory::create([
            'name' => 'Microfiber Towels',
            'description' => 'Soft microfiber towels for drying and polishing',
            'category' => 'Accessories',
            'quantity' => 100,
            'reorder_level' => 20,
            'unit_price' => 15000,
            'supplier' => 'CarCare Accessories Ltd.',
            'last_restocked' => '2025-09-01'
        ]);

        Inventory::create([
            'name' => 'Wax Polish',
            'description' => 'Premium car wax for protection and shine',
            'category' => 'Finishing Products',
            'quantity' => 30,
            'reorder_level' => 5,
            'unit_price' => 75000,
            'supplier' => 'AutoCare Supplies Co.',
            'last_restocked' => '2025-09-01'
        ]);

        Inventory::create([
            'name' => 'Vacuum Cleaner',
            'description' => 'Industrial vacuum cleaner for interior cleaning',
            'category' => 'Equipment',
            'quantity' => 5,
            'reorder_level' => 1,
            'unit_price' => 250000,
            'supplier' => 'Car Equipment Solutions',
            'last_restocked' => '2025-06-15'
        ]);
    }
}

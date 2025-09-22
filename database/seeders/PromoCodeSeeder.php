<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PromoCode;

class PromoCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PromoCode::create([
            'code' => 'FIRST30',
            'name' => 'First-Time Customer Discount',
            'description' => '30% off for first-time customers',
            'type' => 'percentage',
            'value' => 30,
            'minimum_order_amount' => null,
            'usage_limit' => null,
            'used_count' => 0,
            'start_date' => now(),
            'end_date' => now()->addYear(),
            'is_active' => true
        ]);

        PromoCode::create([
            'code' => 'WEEKEND20',
            'name' => 'Weekend Special',
            'description' => '20% off premium detailing on weekends',
            'type' => 'percentage',
            'value' => 20,
            'minimum_order_amount' => null,
            'usage_limit' => null,
            'used_count' => 0,
            'start_date' => now(),
            'end_date' => null,
            'is_active' => true
        ]);

        PromoCode::create([
            'code' => 'LOYALTY10',
            'name' => 'Loyalty Program',
            'description' => '10% off after 5 visits',
            'type' => 'percentage',
            'value' => 10,
            'minimum_order_amount' => null,
            'usage_limit' => null,
            'used_count' => 0,
            'start_date' => now(),
            'end_date' => null,
            'is_active' => true
        ]);
    }
}

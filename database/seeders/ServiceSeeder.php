<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'name' => 'Basic Car Wash',
            'description' => 'Exterior wash including body, wheels, and windows. Perfect for regular maintenance.',
            'price' => 25.00,
            'duration' => 30,
            'is_available' => true
        ]);

        Service::create([
            'name' => 'Deluxe Car Wash',
            'description' => 'Complete exterior and interior cleaning. Includes vacuuming, wiping surfaces, and tire shine.',
            'price' => 45.00,
            'duration' => 60,
            'is_available' => true
        ]);

        Service::create([
            'name' => 'Premium Detailing',
            'description' => 'Professional detailing package. Includes clay bar treatment, waxing, and interior deep cleaning.',
            'price' => 85.00,
            'duration' => 120,
            'is_available' => true
        ]);

        Service::create([
            'name' => 'SUV/Truck Wash',
            'description' => 'Specialized wash for larger vehicles. Exterior wash including body, wheels, and windows.',
            'price' => 35.00,
            'duration' => 45,
            'is_available' => true
        ]);
    }
}

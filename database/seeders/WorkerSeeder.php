<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Worker;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Worker::create([
            'name' => 'Ahmad Surya',
            'email' => 'ahmad.surya@carwash.demo',
            'phone' => '081234567890',
            'position' => 'Washer',
            'hourly_rate' => 25000,
            'commission_rate' => 10,
            'is_active' => true,
            'hire_date' => '2025-01-15'
        ]);

        Worker::create([
            'name' => 'Budi Prasetyo',
            'email' => 'budi.prasetyo@carwash.demo',
            'phone' => '081234567891',
            'position' => 'Detailer',
            'hourly_rate' => 30000,
            'commission_rate' => 15,
            'is_active' => true,
            'hire_date' => '2025-02-20'
        ]);

        Worker::create([
            'name' => 'Citra Dewi',
            'email' => 'citra.dewi@carwash.demo',
            'phone' => '081234567892',
            'position' => 'Manager',
            'hourly_rate' => 40000,
            'commission_rate' => 5,
            'is_active' => true,
            'hire_date' => '2025-03-10'
        ]);
    }
}

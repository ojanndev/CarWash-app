<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'position',
        'hourly_rate',
        'commission_rate',
        'is_active',
        'hire_date',
        'termination_date'
    ];

    protected $casts = [
        'hire_date' => 'date',
        'termination_date' => 'date',
        'is_active' => 'boolean',
        'hourly_rate' => 'decimal:2',
        'commission_rate' => 'decimal:2'
    ];

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_workers')
            ->withPivot('task_status', 'assigned_at', 'completed_at')
            ->withTimestamps();
    }

    public function inventoryUsage()
    {
        return $this->hasMany(InventoryUsage::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}

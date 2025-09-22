<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'service_id',
        'booking_date',
        'vehicle_type',
        'vehicle_make',
        'vehicle_model',
        'status',
        'total_price',
        'payment_status',
        'payment_method',
        'payment_date',
        'notes'
    ];

    protected $casts = [
        'booking_date' => 'datetime',
        'payment_date' => 'datetime',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function workers()
    {
        return $this->belongsToMany(Worker::class, 'booking_workers')
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

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function promoCodeUsage()
    {
        return $this->hasOne(PromoCodeUsage::class);
    }
}

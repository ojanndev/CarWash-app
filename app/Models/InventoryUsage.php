<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventoryUsage extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id',
        'booking_id',
        'worker_id',
        'quantity_used',
        'notes'
    ];

    protected $casts = [
        'quantity_used' => 'integer'
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}
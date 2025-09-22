<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'booking_id',
        'service_id',
        'worker_id',
        'rating',
        'review',
        'title',
        'is_approved'
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_approved' => 'boolean'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    public function photos()
    {
        return $this->hasMany(ReviewPhoto::class);
    }
}
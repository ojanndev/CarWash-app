<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PromoCodeUsage extends Model
{
    use HasFactory;

    protected $fillable = [
        'promo_code_id',
        'customer_id',
        'booking_id',
        'discount_amount'
    ];

    protected $casts = [
        'discount_amount' => 'decimal:2'
    ];

    public function promoCode()
    {
        return $this->belongsTo(PromoCode::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}

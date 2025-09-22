<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PromoCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'type',
        'value',
        'minimum_order_amount',
        'usage_limit',
        'used_count',
        'start_date',
        'end_date',
        'is_active'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_active' => 'boolean'
    ];

    public function isValid()
    {
        // Check if promo code is active
        if (!$this->is_active) {
            return false;
        }

        // Check if promo code is within date range
        $now = now();
        if ($this->start_date && $now < $this->start_date) {
            return false;
        }

        if ($this->end_date && $now > $this->end_date) {
            return false;
        }

        // Check if usage limit is reached
        if ($this->usage_limit && $this->used_count >= $this->usage_limit) {
            return false;
        }

        return true;
    }

    public function applyDiscount($amount)
    {
        if (!$this->isValid()) {
            return 0;
        }

        // Check minimum order amount
        if ($this->minimum_order_amount && $amount < $this->minimum_order_amount) {
            return 0;
        }

        if ($this->type === 'percentage') {
            return $amount * ($this->value / 100);
        } elseif ($this->type === 'fixed_amount') {
            return min($this->value, $amount);
        }

        return 0;
    }

    public function usage()
    {
        return $this->hasMany(PromoCodeUsage::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'type',
        'title',
        'message',
        'is_read',
        'related_model_type',
        'related_model_id'
    ];

    protected $casts = [
        'is_read' => 'boolean'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

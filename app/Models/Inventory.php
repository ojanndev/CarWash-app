<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'quantity',
        'reorder_level',
        'unit_price',
        'supplier',
        'last_restocked'
    ];

    protected $casts = [
        'last_restocked' => 'date',
        'unit_price' => 'decimal:2',
        'quantity' => 'integer',
        'reorder_level' => 'integer'
    ];

    public function usage()
    {
        return $this->hasMany(InventoryUsage::class);
    }
}

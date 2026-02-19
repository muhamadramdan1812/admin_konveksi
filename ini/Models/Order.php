<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_draft_id',
        'reseller',
        'customer_name',
        'order_date',
        'deadline',
        'status'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    
}


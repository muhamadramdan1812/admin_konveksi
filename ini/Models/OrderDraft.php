<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDraft extends Model
{
    protected $fillable = [
        'reseller',
        'customer_name',
        'raw_text',
        'status'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_draft_id');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

    class OrderItem extends Model
    {
        protected $fillable = [
        'order_draft_id',
        'product_name',
        'size',
        'series',
        'qty',
        'note'
    ];

    public function draft()
    {
        return $this->belongsTo(OrderDraft::class, 'order_draft_id');
    }
    }


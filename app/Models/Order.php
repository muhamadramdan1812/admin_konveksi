<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Reseller;

class Order extends Model
{
    protected $fillable = [
        'order_draft_id',
        'reseller_id',
        'customer_name',
        'order_date',
        'deadline',
        'status',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function reseller()
{
    return $this->belongsTo(Reseller::class, 'reseller_id', 'id');
}
}


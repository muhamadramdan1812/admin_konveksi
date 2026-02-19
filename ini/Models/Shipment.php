<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = [
        'order_id','shipping_date','courier','tracking_number','shipping_note'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}


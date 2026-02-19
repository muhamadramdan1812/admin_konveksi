<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrintOrder extends Model
{
    protected $fillable = [
        'order_id','item_name','quantity','material','print_date'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function designSpecification()
    {
        return $this->hasOne(DesignSpecification::class);
    }
}


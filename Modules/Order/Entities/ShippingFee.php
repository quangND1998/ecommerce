<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShippingFee extends Model
{
    use HasFactory;

    protected $table = 'shipping_fees';
    protected $fillable = ['id', 'name','fee', 'start_price', 'end_price', 'created_at', 'updated_at'];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Order\Database\factories\ShippingFeeFactory::new();
    }
}

<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ProductCategory\Entities\Product;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'quantity',
        'price',
        'total_price',
        'discount',
        'price_sale',
        'created_at',
        "updated_at"
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    protected static function newFactory()
    {
        return \Modules\Order\Database\factories\OrderItemFactory::new();
    }
}

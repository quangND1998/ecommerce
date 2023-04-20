<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\ProductCategory\Entities\Product;

class SaleItem extends Model
{
    use HasFactory;

    protected $table = 'sale_items';
    protected $fillable = [
        'id', 'sale_id', 'product_id',    'quantity',    'price', 'discount', 'price_sale',    'stock', 'created_at',    'updated_at'

    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

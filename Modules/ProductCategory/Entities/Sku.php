<?php

namespace Modules\ProductCategory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sku extends Model
{
    use HasFactory;

    protected $table = 'skus';

    /**
     * @var array
     */
    protected $fillable = ['id', 'product_id', 'name', 'price', 'barcode', 'stock', 'updated_at', 'created_at'];
  
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variants()
    {
        return $this->hasMany(Variants::class, 'sku_id');
    }
    
    protected static function newFactory()
    {
        return \Modules\ProductCategory\Database\factories\SkuFactory::new();
    }
}

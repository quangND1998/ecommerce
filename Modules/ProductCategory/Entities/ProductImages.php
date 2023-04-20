<?php

namespace Modules\ProductCategory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImages extends Model
{
    use HasFactory;

    protected $table = 'product_images';

    /**
     * @var array
     */
    protected $fillable = ['id', 'name', 'image', 'product_id', 'priority', 'created_at', 'updated_at'];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    protected static function newFactory()
    {
        return \Modules\ProductCategory\Database\factories\ProductImagesFactory::new();
    }
}

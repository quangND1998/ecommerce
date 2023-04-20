<?php

namespace Modules\ProductCategory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttributeValue extends Model
{
    use HasFactory;

    protected $table = 'attribute_values';
    protected $fillable = ['id', 'name', 'value', 'attribute_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function productAttributes()
    {
        return $this->belongsToMany(ProductAttribute::class, 'product_attributes');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_attribute_values', 'value_id', 'product_id');
    }
    protected static function newFactory()
    {
        return \Modules\ProductCategory\Database\factories\AttributeValueFactory::new();
    }
}

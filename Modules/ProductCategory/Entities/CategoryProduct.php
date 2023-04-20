<?php

namespace Modules\ProductCategory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class CategoryProduct extends Model
{
    use HasFactory;
    protected $table = 'category_products';
    protected $fillable = ['id', 'name', 'slug', 'image', 'parent_id', 'state', 'created_at', 'updated_at'];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
    /**
     * Get the index name for the model.
     *
     * @return string
     */


    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->slug = Str::slug($model->name);
        });

        self::updating(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }
    public function categories()
    {
        return $this->hasMany(CategoryProduct::class, 'parent_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'parent_id');
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class, 'category_product_id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(CategoryProduct::class, 'parent_id')->with('categories', 'category');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function subproducts()
    {
        return $this->hasManyThrough(Product::class, self::class, 'parent_id', 'category_id');
    }

    protected static function newFactory()
    {
        return \Modules\ProductCategory\Database\factories\CategoryProductFactory::new();
    }
}

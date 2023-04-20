<?php

namespace Modules\ProductCategory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
class Attribute extends Model
{
    use HasFactory;

    protected $table = 'attributes';
    protected $fillable = ['id', 'idNo','slug','name', 'code', 'state', 'category_product_id', 'created_at', 'updated_at'];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->slug = Str::slug($model->name,'_');
        });

        self::updating(function ($model) {
            $model->slug = Str::slug($model->name,'_');
        });
    }
    public function category_product()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_product_id');
    }
    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }

    protected static function newFactory()
    {
        return \Modules\ProductCategory\Database\factories\AttributeCategoryFactory::new();
    }
}

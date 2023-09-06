<?php

namespace Modules\ProductCategory\Entities;

use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['id', 'name', 'slug', 'description', 'SKU', 'status', 'active', 'auto_sold', 'price', 'cost', 'quantity_sold', 'quantity_sold_auto', 'star', 'outstanding', 'category_id', 'created_at', 'updated_at'];
    // protected $casts = [
    //     'active' => 'boolean',
    //     'status' => 'boolean',
    //     'auto_sold' => 'boolean'
    // ];
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

  

    public function sale_items(){
        return $this->hasMany(SaleItem::class);
    }


    // public function sales_run(){
    //     return $this->hasMany(SaleItem::class)->where('status','running');
    // }
    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }
    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id');
    }
    public function first_image()
    {
        return $this->hasOne(ProductImages::class, 'product_id')->oldest();
    }
    public function images()
    {
        return $this->hasMany(ProductImages::class, 'product_id')->orderBy('priority', 'asc')->orderBy('id', 'asc');
    }

    public function scopeStatusActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeFilter($query, array $filters)
    {
        // $active['status']==null ? $query->get():
        // dd($active['status']);
        //   $status=  $active['status'];
        // $query->where('status',  $status);
        if (array_key_exists('status', $filters)) {
            $query->where('status',  $filters['status']);
        } else {

            $query->get();
        }
    }

    public function values()
    {
        return $this->belongsToMany(AttributeValue::class, 'product_attribute_values', 'product_id', 'value_id')->orderBy('attribute_id', 'asc');
    }
    protected static function newFactory()
    {
        return \Modules\ProductCategory\Database\factories\ProductFactory::new();
    }
    public function checkSale()
    {
        $sale = $this->whereHas('sale_items.sale', function($q){
            $q->where('state', 'running');
        })->with('sale_items.sale')->first();
        return $sale;
    }
    public function sale_running()
    {
        $sale = $this->whereHas('sale_items.sale', function($q){
            return $q->where('state', 'running');
        })->with('sale_items.sale')->first();
    }


    public function options()
    {
        return $this->hasMany(Options::class);
    }

    public function optionValues()
    {
        return $this->hasMany(OptionValue::class, 'product_id');
    }

    public function skus()
    {
        return $this->hasMany(Sku::class);
    }

    public function variants()
    {
        return $this->hasMany(Variants::class);
    }

    public function generateVariant(array $input): array
    {
        if (!count($input)) return [];

        $result = [[]];

        foreach ($input as $key => $values) {
            $append = [];
            foreach ($values as $value) {
                foreach ($result as $data) {
                    $append[] = $data + [$key => $value];
                }
            }
            $result = $append;
        }

        return $result;
    }

    public function saveVariant(array $variants)
    {
        $skus = $this->skus()->createMany(array_fill(0, count($variants), []));

        $variantOptions = [];

        foreach ($skus as $index => $sku) {
            foreach ($variants[$index] as $optionValue) {
                $variantOptions[] = [
                    'product_id' => $this->id,
                    'sku_id' => $sku->id,
                    'options_id' => $optionValue['options_id'],
                    'option_value_id' => $optionValue['id'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        $this->variants()->insert($variantOptions);
    }
}

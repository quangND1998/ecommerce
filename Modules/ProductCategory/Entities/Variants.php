<?php

namespace Modules\ProductCategory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Variants extends Model
{
    use HasFactory;
    protected $table = 'variants';

    /**
     * @var array
     */
    protected $fillable = ['id', 'product_id', 'sku_id', 'options_id', 'option_value_id', 'created_at', 'updated_at'];
    public function option()
    {
        return $this->belongsTo(Option::class);
    }
    
  

    public function optionValue()
    {
        return $this->belongsTo(OptionValue::class);
    }
    
    protected static function newFactory()
    {
        return \Modules\ProductCategory\Database\factories\VariantsFactory::new();
    }
}

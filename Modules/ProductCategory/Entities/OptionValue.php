<?php

namespace Modules\ProductCategory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OptionValue extends Model
{
    use HasFactory;
    protected $table = 'option_values';
    protected $fillable = ['id','value', 'label', 'options_id', 'product_id'];

    public function option()
    {
        return $this->belongsTo(Options::class);
    }
    
    protected static function newFactory()
    {
        return \Modules\ProductCategory\Database\factories\OptionValueFactory::new();
    }
}

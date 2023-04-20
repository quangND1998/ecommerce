<?php

namespace Modules\ProductCategory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Options extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'visual'];

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function optionValues(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OptionValue::class);
    }
    protected static function newFactory()
    {
        return \Modules\ProductCategory\Database\factories\OptionsFactory::new();
    }
}

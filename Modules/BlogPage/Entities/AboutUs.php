<?php

namespace Modules\BlogPage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutUs extends Model
{
    use HasFactory;
    protected $table = 'about_us';

    protected $fillable = ["id", "description", "image", 'created_at', "updated_at"];

    protected static function newFactory()
    {
        return \Modules\BlogPage\Database\factories\AboutUsFactory::new();
    }
}

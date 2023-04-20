<?php

namespace Modules\BlogPage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Home extends Model
{
    use HasFactory;

    protected $table = 'homes';

    protected $fillable = ["id", "link", "image", 'state', 'priority', 'created_at', "updated_at"];

    protected static function newFactory()
    {
        return \Modules\BlogPage\Database\factories\HomeFactory::new();
    }
}

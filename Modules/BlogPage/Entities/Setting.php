<?php

namespace Modules\BlogPage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';

    protected $fillable = ["id", "company_name", "address",    "email",    "tax_code",    "hotline", "zalo_phone",    "facebook",    "map", 'created_at', "updated_at"];

    protected static function newFactory()
    {
        return \Modules\BlogPage\Database\factories\SettingFactory::new();
    }
}

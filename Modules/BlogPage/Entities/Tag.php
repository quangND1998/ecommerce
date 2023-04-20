<?php

namespace Modules\BlogPage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $fillable = ['id', 'name', 'slug', 'created_at', 'updated_at'];


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
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'posts_tags', 'tag_id', 'post_id');
    }

    protected static function newFactory()
    {
        return \Modules\BlogPage\Database\factories\TagFactory::new();
    }
}

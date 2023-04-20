<?php

namespace Modules\BlogPage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = ['id', 'name', 'sub_title', 'slug', 'description', 'url', 'state', 'outstanding', 'image', 'post_time', 'created_at', 'updated_at'];

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
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'posts_tags', 'post_id', 'tag_id');
    }

    public function scopeFilter($query, array $filters)
    {
        if (array_key_exists('active', $filters)) {
            $query->where('active',  $filters['active']);
        } else {

            $query->get();
        }
    }
    protected static function newFactory()
    {
        return \Modules\BlogPage\Database\factories\PostFactory::new();
    }
}

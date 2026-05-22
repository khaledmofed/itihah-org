<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['slug', 'title_ar', 'title_en', 'content_ar', 'content_en', 'excerpt_ar', 'image', 'author', 'published_at', 'is_published'];

    protected $casts = ['is_published' => 'boolean', 'published_at' => 'datetime'];

    public function scopePublished($q)
    {
        return $q->where('is_published', true)->orderBy('published_at', 'desc');
    }
}

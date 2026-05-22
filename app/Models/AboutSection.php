<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $fillable = ['section_key', 'title_ar', 'title_en', 'content_ar', 'content_en', 'image', 'icon', 'extra_data', 'is_active', 'order'];

    protected $casts = ['is_active' => 'boolean', 'extra_data' => 'array'];

    public function scopeActive($q)
    {
        return $q->where('is_active', true)->orderBy('order');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $fillable = ['slug', 'title_ar', 'title_en', 'description_ar', 'description_en', 'criteria_ar', 'icon', 'image', 'badge_color', 'is_active', 'order'];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($q)
    {
        return $q->where('is_active', true)->orderBy('order');
    }
}

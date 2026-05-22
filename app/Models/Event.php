<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['slug', 'title_ar', 'title_en', 'description_ar', 'description_en', 'category', 'event_date', 'location_ar', 'location_en', 'image', 'gallery', 'is_active', 'order'];

    protected $casts = ['is_active' => 'boolean', 'gallery' => 'array', 'event_date' => 'date'];

    public function scopeActive($q)
    {
        return $q->where('is_active', true)->orderBy('event_date', 'desc');
    }
}

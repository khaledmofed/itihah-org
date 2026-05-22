<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationalPath extends Model
{
    protected $fillable = ['category', 'title_ar', 'title_en', 'description_ar', 'description_en', 'logo', 'color', 'duration', 'level', 'requirements', 'objectives', 'is_active', 'order'];

    protected $casts = ['is_active' => 'boolean', 'requirements' => 'array', 'objectives' => 'array'];

    public function scopeActive($q)
    {
        return $q->where('is_active', true)->orderBy('order');
    }

    public function scopeByCategory($q, $cat)
    {
        return $q->where('category', $cat);
    }
}

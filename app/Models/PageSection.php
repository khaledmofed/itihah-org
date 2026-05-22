<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    protected $fillable = ['page', 'section', 'key', 'type', 'value'];

    public static function getValue(string $page, string $section, string $key, string $default = ''): string
    {
        $record = static::where('page', $page)
            ->where('section', $section)
            ->where('key', $key)
            ->first();

        return $record?->value ?? $default;
    }

    public static function set(string $page, string $section, string $key, ?string $value, string $type = 'text'): void
    {
        static::updateOrCreate(
            ['page' => $page, 'section' => $section, 'key' => $key],
            ['value' => $value, 'type' => $type]
        );
    }

    public static function getSection(string $page, string $section): array
    {
        return static::where('page', $page)
            ->where('section', $section)
            ->pluck('value', 'key')
            ->toArray();
    }
}

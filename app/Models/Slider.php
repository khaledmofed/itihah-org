<?php

namespace App\Models;

use App\Support\VideoEmbedResolver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    protected $fillable = ['title_ar', 'title_en', 'subtitle_ar', 'subtitle_en', 'button_text_ar', 'button_url', 'image', 'video_url', 'video_path', 'is_active', 'order'];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($q)
    {
        return $q->where('is_active', true)->orderBy('order');
    }

    /** رابط تشغيل الفيديو: الملف المرفوع له أولوية على الرابط الخارجي */
    public function resolvedVideoSrc(): ?string
    {
        if ($this->video_path) {
            return Storage::disk('public')->url($this->video_path);
        }

        return $this->video_url ?: null;
    }

    /** بيانات العرض: direct | youtube | instagram | vimeo */
    public function resolvedVideoPlayback(): ?array
    {
        if ($this->video_path) {
            return VideoEmbedResolver::resolve(null, Storage::disk('public')->url($this->video_path));
        }

        return VideoEmbedResolver::resolve($this->video_url, null);
    }

    public function hasPlayableVideo(): bool
    {
        return $this->resolvedVideoPlayback() !== null;
    }
}

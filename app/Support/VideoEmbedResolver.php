<?php

namespace App\Support;

use Illuminate\Support\Facades\Http;

/**
 * يحوّل روابط يوتيوب / إنستغرام / فيميو أو ملفات فيديو مباشرة إلى بيانات للعرض في الواجهة.
 */
class VideoEmbedResolver
{
    /**
     * @return array{kind: string, src: ?string, embed: ?string, thumb: ?string}|null
     */
    public static function resolve(?string $pageOrFileUrl, ?string $directFileUrl = null): ?array
    {
        if ($directFileUrl !== null && $directFileUrl !== '') {
            return [
                'kind' => 'direct',
                'src' => $directFileUrl,
                'embed' => null,
                'thumb' => null,
            ];
        }

        $url = trim((string) $pageOrFileUrl);
        if ($url === '' || ! filter_var($url, FILTER_VALIDATE_URL)) {
            return null;
        }

        if (preg_match('/\.(mp4|webm|ogg|ogv|mov|m4v|mpeg|mpg)(\?|#|$)/i', $url)) {
            return [
                'kind' => 'direct',
                'src' => $url,
                'embed' => null,
                'thumb' => null,
            ];
        }

        if (preg_match('/(?:youtube\.com\/(?:watch\?(?:[^#]*&)*v=|embed\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $m)) {
            $id = $m[1];
            $embed = 'https://www.youtube.com/embed/'.$id.'?autoplay=1&mute=1&playsinline=1&rel=0';

            return [
                'kind' => 'youtube',
                'src' => null,
                'embed' => $embed,
                'thumb' => 'https://img.youtube.com/vi/'.$id.'/hqdefault.jpg',
            ];
        }

        if (preg_match('#instagram\.com/(p|reel|tv)/([A-Za-z0-9_-]+)#', $url, $m)) {
            $igType = $m[1];
            $code = $m[2];
            $embed = 'https://www.instagram.com/'.$igType.'/'.$code.'/embed/?autoplay=1';
            /** معاينة من مسار الوسائط الرسمي (قد لا يعمل في بعض الشبكات دون جلسة إنستغرام) */
            $thumb = 'https://www.instagram.com/'.$igType.'/'.$code.'/media/?size=m';

            return [
                'kind' => 'instagram',
                'src' => null,
                'embed' => $embed,
                'thumb' => $thumb,
            ];
        }

        if (preg_match('#vimeo\.com/(?:channels\/[^/]+\/|groups\/[^/]+\/videos\/|video\/)?(\d+)#', $url, $m)) {
            $id = $m[1];
            $embed = 'https://player.vimeo.com/video/'.$id.'?autoplay=1&muted=1&playsinline=1';
            $thumb = null;
            try {
                $resp = Http::timeout(3)->acceptJson()->get('https://vimeo.com/api/oembed.json', ['url' => $url]);
                if ($resp->successful()) {
                    $thumb = $resp->json('thumbnail_url');
                }
            } catch (\Throwable) {
            }

            return [
                'kind' => 'vimeo',
                'src' => null,
                'embed' => $embed,
                'thumb' => $thumb,
            ];
        }

        return null;
    }
}

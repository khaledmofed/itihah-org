@extends('layouts.app')

@section('title', 'الأخبار والمقالات')

@section('content')

<div class="elementor elementor-1671" dir="rtl">

@include('partials.hero', [
    'heroTitle'      => 'الأخبار والمقالات',
    'heroDesc'       => 'اطّلع على آخر أخبار الاتحاد العالمي الأكاديمي للتزيين ومقالاته المتخصصة.',
    'heroBreadcrumb' => 'الأخبار والمقالات',
])

<section class="section" style="background:#fff;">
    <div class="container">

        @forelse($news as $article)
        @if($loop->first)
        <div class="news-grid">
        @endif

            <div class="news-card">
                <a href="{{ route('news.show', $article->slug) }}" class="news-card-img-wrap">
                    @if($article->image)
                        <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title_ar }}">
                    @else
                        <img src="{{ asset('images/skincare-concept-beautiful-black-woman-massaging-2026-03-24-02-24-58-utc2.webp') }}" alt="{{ $article->title_ar }}">
                    @endif
                </a>
                <div class="news-card-body">
                    <div class="news-meta">
                        @if($article->author)
                        <span class="news-author"><i class="far fa-user-circle"></i> {{ $article->author }}</span>
                        @endif
                        @if($article->published_at)
                        <span class="news-date"><i class="far fa-calendar-alt"></i> {{ $article->published_at->format('d/m/Y') }}</span>
                        @endif
                    </div>
                    <h5 class="news-title">
                        <a href="{{ route('news.show', $article->slug) }}">{{ $article->title_ar }}</a>
                    </h5>
                    @if($article->excerpt_ar)
                        <p class="news-excerpt">{{ $article->excerpt_ar }}</p>
                    @elseif($article->content_ar)
                        <p class="news-excerpt">{{ Str::limit(strip_tags($article->content_ar), 130) }}</p>
                    @endif
                    <a class="news-read-more" href="{{ route('news.show', $article->slug) }}">اقرأ المزيد <i class="fas fa-arrow-left"></i></a>
                </div>
            </div>

        @if($loop->last)
        </div>
        @endif

        @empty
        <div style="text-align:center;padding:80px 0;">
            <i class="fas fa-newspaper" style="font-size:3.5rem;color:var(--primary-light);opacity:0.3;display:block;margin-bottom:16px;"></i>
            <h4 style="color:var(--text-muted);font-family:'Cormorant','Tajawal',serif;">لا توجد أخبار أو مقالات منشورة حتى الآن</h4>
            <p style="color:var(--text-muted);font-size:14px;">تابعونا قريباً للاطلاع على آخر الأخبار والمقالات.</p>
        </div>
        @endforelse

        @if($news->hasPages())
        <div style="margin-top:48px;display:flex;justify-content:center;">
            {{ $news->links() }}
        </div>
        @endif

    </div>
</section>

</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/post-1671.css') }}">
<style>
.news-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 28px;
}
.news-card {
    background: #fff;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 4px 30px rgba(33,102,169,0.07);
    transition: all 0.3s;
    display: flex;
    flex-direction: column;
}
.news-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 50px rgba(33,102,169,0.14);
}
.news-card-img-wrap {
    display: block;
    overflow: hidden;
    height: 200px;
}
.news-card-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s;
}
.news-card:hover .news-card-img-wrap img { transform: scale(1.05); }
.news-card-body {
    padding: 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
}
.news-meta {
    display: flex;
    align-items: center;
    gap: 14px;
    font-size: 12px;
    color: var(--text-muted);
    margin-bottom: 10px;
    flex-wrap: wrap;
}
.news-author, .news-date {
    display: flex;
    align-items: center;
    gap: 5px;
}
.news-author i, .news-date i { color: var(--primary); }
.news-title {
    font-family: 'Tajawal', sans-serif;
    font-size: 24px;
    font-weight: 700;
    color: var(--text-dark);
    margin: 0 0 10px;
    line-height: 1.5;
}
.news-title a { color: inherit; }
.news-title a:hover { color: var(--primary); }
.news-excerpt {
    font-size: 13.5px;
    color: var(--text-muted);
    line-height: 1.7;
    flex: 1;
    margin: 0 0 12px;
}
.news-read-more {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    font-weight: 600;
    color: var(--primary);
    margin-top: auto;
}
.news-read-more:hover { color: var(--primary-dark); }

@media (max-width: 991px) {
    .news-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 575px) {
    .news-grid { grid-template-columns: 1fr; }
}
</style>
@endpush

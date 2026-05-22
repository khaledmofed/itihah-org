@extends('layouts.app')

@section('title', $article->title_ar)

@section('content')

<div class="elementor elementor-457" dir="rtl">

{{-- ===== HERO / POST HEADER ===== --}}
<div class="elementor-element elementor-element-70fda94 e-con-full e-flex e-con e-parent e-lazyloaded" data-id="70fda94" data-element_type="container">
    <div class="elementor-element elementor-element-1915291 e-con-full e-flex e-con e-child" data-id="1915291" data-element_type="container">
        <div class="elementor-element elementor-element-cf535dd e-con-full e-flex e-con e-child" data-id="cf535dd" data-element_type="container">
            <div class="elementor-element elementor-element-3decc8f e-con-full e-flex e-con e-child" data-id="3decc8f" data-element_type="container">
                {{-- Post Title --}}
                <div class="elementor-element elementor-element-08e7ac3 elementor-widget elementor-widget-heading" data-id="08e7ac3" data-element_type="widget" data-widget_type="heading.default">
                    <div class="jeg-elementor-kit jkit-post-title">
                        <h1 class="post-title style-color">{{ $article->title_ar }}</h1>
                    </div>
                </div>
                {{-- Author row --}}
                @if($article->author)
                <div class="elementor-element elementor-element-351769d e-con-full e-flex e-con e-child" data-id="351769d" data-element_type="container">
                    <div class="elementor-element elementor-element-ec78e93 elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list" data-id="ec78e93" data-element_type="widget" data-widget_type="icon-list.default">
                        <ul class="elementor-icon-list-items">
                            <li class="elementor-icon-list-item">
                                <span class="elementor-icon-list-icon">
                                    <svg aria-hidden="true" class="e-font-icon-svg e-far-user-circle" viewBox="0 0 496 512" xmlns="http://www.w3.org/2000/svg"><path d="M248 104c-53 0-96 43-96 96s43 96 96 96 96-43 96-96-43-96-96-96zm0 144c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm0-240C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 448c-49.7 0-95.1-18.3-130.1-48.4 14.9-23 40.4-38.6 69.6-39.5 20.8 6.4 40.6 9.6 60.5 9.6s39.7-3.1 60.5-9.6c29.2 1 54.7 16.5 69.6 39.5-35 30.1-80.4 48.4-130.1 48.4zm162.7-84.1c-24.4-31.4-62.1-51.9-105.1-51.9-10.2 0-26 9.6-57.6 9.6-31.5 0-47.4-9.6-57.6-9.6-42.9 0-80.6 20.5-105.1 51.9C61.9 339.2 48 299.2 48 256c0-110.3 89.7-200 200-200s200 89.7 200 200c0 43.2-13.9 83.2-37.3 115.9z"></path></svg>
                                </span>
                                <span class="elementor-icon-list-text">بقلم</span>
                            </li>
                        </ul>
                    </div>
                    <div class="elementor-element elementor-element-a89069a elementor-widget elementor-widget-heading" data-id="a89069a" data-element_type="widget" data-widget_type="heading.default">
                        <div class="jeg-elementor-kit jkit-post-author">
                            <p class="post-author">{{ $article->author }}</p>
                        </div>
                    </div>
                </div>
                @endif
                {{-- Date row --}}
                @if($article->published_at)
                <div class="elementor-element elementor-element-e2e7c74 e-con-full e-flex e-con e-child" data-id="e2e7c74" data-element_type="container">
                    <div class="elementor-element elementor-element-97ff4b2 elementor-view-default elementor-widget elementor-widget-icon" data-id="97ff4b2" data-element_type="widget" data-widget_type="icon.default">
                        <div class="elementor-icon-wrapper">
                            <div class="elementor-icon">
                                <svg aria-hidden="true" class="e-font-icon-svg e-far-calendar-alt" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"></path></svg>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-e1d6444 elementor-widget elementor-widget-heading" data-id="e1d6444" data-element_type="widget" data-widget_type="heading.default">
                        <div class="jeg-elementor-kit jkit-post-date">
                            <p class="post-date">{{ $article->published_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- ===== MAIN CONTENT + SIDEBAR ===== --}}
<div class="elementor-element elementor-element-aecc20d e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="aecc20d" data-element_type="container">
    <div class="e-con-inner">
        {{-- Article Content --}}
        <div class="elementor-element elementor-element-2575242 e-con-full e-flex e-con e-child" data-id="2575242" data-element_type="container">
            {{-- Featured Image --}}
            <div class="elementor-element elementor-element-40d8755 e-con-full e-flex e-con e-child" data-id="40d8755" data-element_type="container">
                <div class="elementor-element elementor-element-e8b2c1f elementor-widget elementor-widget-image" data-id="e8b2c1f" data-element_type="widget" data-widget_type="image.default">
                    <div class="jeg-elementor-kit jkit-post-featured-image">
                        <div class="post-featured-image">
                            @if($article->image)
                                <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title_ar }}">
                            @else
                                <img src="{{ asset('images/skincare-concept-beautiful-black-woman-massaging-2026-03-24-02-24-58-utc2.webp') }}" alt="{{ $article->title_ar }}">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- Article Body --}}
            <div class="elementor-element elementor-element-9277e1b elementor-drop-cap-yes elementor-drop-cap-view-default elementor-widget elementor-widget-text-editor" data-id="9277e1b" data-element_type="widget" data-widget_type="text-editor.default">
                {!! $article->content_ar !!}
            </div>
            {{-- Tags + Back Link --}}
            <div class="elementor-element elementor-element-2f2b662 e-con-full e-flex e-con e-child" data-id="2f2b662" data-element_type="container">
                <div class="elementor-element elementor-element-6c48ff1 elementor-widget elementor-widget-heading" data-id="6c48ff1" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-heading-title elementor-size-default">العودة:</div>
                </div>
                <div class="elementor-element elementor-element-aee9e35 elementor-widget elementor-widget-heading" data-id="aee9e35" data-element_type="widget" data-widget_type="heading.default">
                    <a href="{{ route('news') }}" class="elementor-heading-title elementor-size-default" style="text-decoration:none;">
                        ← الأخبار والمقالات
                    </a>
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="elementor-element elementor-element-ed4c2df e-con-full e-flex e-con e-child" data-id="ed4c2df" data-element_type="container">
            {{-- Related Posts --}}
            <div class="elementor-element elementor-element-ef1cdf2 e-con-full e-flex e-con e-child" data-id="ef1cdf2" data-element_type="container">
                <div class="elementor-element elementor-element-bc367cd elementor-widget elementor-widget-heading" data-id="bc367cd" data-element_type="widget" data-widget_type="heading.default">
                    <h3 class="elementor-heading-title elementor-size-default">أحدث المقالات</h3>
                </div>
                <div class="elementor-element elementor-element-71c5ccc elementor-widget elementor-widget-elementskit-post-list" data-id="71c5ccc" data-element_type="widget" data-widget_type="elementskit-post-list.default">
                    <div class="elementor-widget-container">
                        <div class="ekit-wid-con">
                            <ul class="elementor-icon-list-items ekit-post-list-wrapper elementor-inline-items">
                                @foreach($related as $rel)
                                <li class="elementor-icon-list-item col-lg-12 col-md-6 col-xs-12">
                                    <a href="{{ route('news.show', $rel->slug) }}">
                                        @if($rel->image)
                                            <img src="{{ Storage::url($rel->image) }}" alt="{{ $rel->title_ar }}">
                                        @else
                                            <img src="{{ asset('images/skincare-concept-beautiful-black-woman-massaging-2026-03-24-02-24-58-utc2.webp') }}" alt="{{ $rel->title_ar }}">
                                        @endif
                                        <div class="ekit_post_list_content_wraper">
                                            @if($rel->published_at)
                                            <div class="meta-lists">
                                                <span class="meta-date" dir="ltr" style="display:inline-block;">{{ $rel->published_at->format('d M Y') }}</span>
                                            </div>
                                            @endif
                                            <span class="elementor-icon-list-text">{{ $rel->title_ar }}</span>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="elementor-element elementor-element-c438fa1 e-con-full e-flex e-con e-child" data-id="c438fa1" data-element_type="container">
                <div class="elementor-element elementor-element-100cdd7 elementor-widget elementor-widget-heading" data-id="100cdd7" data-element_type="widget" data-widget_type="heading.default">
                    <h3 class="elementor-heading-title elementor-size-default">روابط سريعة</h3>
                </div>
                <div class="elementor-element elementor-element-be9a0ed elementor-widget elementor-widget-elementskit-category-list" data-id="be9a0ed" data-element_type="widget" data-widget_type="elementskit-category-list.default">
                    <div class="elementor-widget-container">
                        <ul class="ekit-category-list-wrapper">
                            <li><a href="{{ route('education') }}"><span class="category-name">المسارات التعليمية</span><span class="category-count"><i class="fas fa-chevron-left"></i></span></a></li>
                            <li><a href="{{ route('awards') }}"><span class="category-name">الجوائز والأوسمة</span><span class="category-count"><i class="fas fa-chevron-left"></i></span></a></li>
                            <li><a href="{{ route('events') }}"><span class="category-name">الفعاليات الدولية</span><span class="category-count"><i class="fas fa-chevron-left"></i></span></a></li>
                            <li><a href="{{ route('profession-day') }}"><span class="category-name">يوم المهنة العالمي</span><span class="category-count"><i class="fas fa-chevron-left"></i></span></a></li>
                            <li><a href="{{ route('contact') }}"><span class="category-name">تواصل معنا</span><span class="category-count"><i class="fas fa-chevron-left"></i></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>{{-- end .elementor-457 --}}

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/post-457.css') }}">
<style>
/* ── أحدث المقالات – sidebar list ── */
.elementor-457 .elementor-element-71c5ccc .elementor-icon-list-item a {
    display: flex !important;
    align-items: flex-start !important;
    gap: 12px !important;
    padding: 0 0 16px 0 !important;
    border-bottom: 1px solid #e8eef5;
    text-decoration: none !important;
}
.elementor-457 .elementor-element-71c5ccc .elementor-icon-list-item a > img {
    width: 80px !important;
    height: 60px !important;
    object-fit: cover !important;
    border-radius: 10px !important;
    flex-shrink: 0;
}
.elementor-457 .elementor-element-71c5ccc .ekit_post_list_content_wraper {
    flex: 1;
}
.elementor-457 .elementor-element-71c5ccc .meta-date {
    font-size: 11px !important;
    color: var(--primary) !important;
    font-weight: 600;
    display: block;
    margin-bottom: 4px;
}
.elementor-457 .elementor-element-71c5ccc .elementor-icon-list-text {
    font-size: 13px !important;
    color: var(--text-dark) !important;
    line-height: 1.5 !important;
    font-weight: 600;
    display: block;
}
.elementor-457 .elementor-element-71c5ccc .elementor-icon-list-item a:hover .elementor-icon-list-text {
    color: var(--primary) !important;
}

/* ── روابط سريعة – dark bg box ── */
.elementor-457 .elementor-element-c438fa1 {
    background: var(--primary-dark) !important;
}
.elementor-457 .elementor-element-100cdd7 .elementor-heading-title {
    color: #fff !important;
}
.elementor-457 .elementor-element-be9a0ed .ekit-category-list-wrapper {
    list-style: none !important;
    padding: 0 !important;
    margin: 0 !important;
}
.elementor-457 .elementor-element-be9a0ed .ekit-category-list-wrapper li {
    border-bottom: 1px solid rgba(255,255,255,0.1);
}
.elementor-457 .elementor-element-be9a0ed .ekit-category-list-wrapper li:last-child {
    border-bottom: none;
}
.elementor-457 .elementor-element-be9a0ed .ekit-category-list-wrapper li a {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    padding: 11px 0 !important;
    color: rgba(255,255,255,0.85) !important;
    text-decoration: none !important;
    font-size: 14px !important;
    transition: color 0.2s;
}
.elementor-457 .elementor-element-be9a0ed .ekit-category-list-wrapper li a:hover {
    color: #fff !important;
}
.elementor-457 .elementor-element-be9a0ed .ekit-category-list-wrapper li a .category-count i {
    color: rgba(255,255,255,0.5) !important;
    font-size: 11px;
}
.elementor-457 .elementor-element-be9a0ed .ekit-category-list-wrapper li a:hover .category-count i {
    color: #fff !important;
}
</style>
@endpush

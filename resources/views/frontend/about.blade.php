@extends('layouts.app')

@section('title', 'عن المنظمة')

@section('content')

@php
use App\Models\PageSection;
$ps = fn(string $section, string $key, string $default = '') =>
    PageSection::getValue('home', $section, $key, $default);
@endphp

<div class="elementor elementor-1381" dir="rtl">

{{-- ===== HERO / PAGE BANNER ===== --}}
<div class="elementor-element elementor-element-8415452 e-con-full e-flex e-con e-parent e-lazyloaded" data-id="8415452" data-element_type="container">
    <div class="elementor-element elementor-element-bd71c79 e-con-full e-flex e-con e-child" data-id="bd71c79" data-element_type="container">
        <div class="elementor-element elementor-element-be5d04a e-con-full e-flex e-con e-child" data-id="be5d04a" data-element_type="container">
            {{-- Title --}}
            <div class="elementor-element elementor-element-99b85ed e-con-full e-flex e-con e-child" data-id="99b85ed" data-element_type="container">
                <div class="elementor-element elementor-element-27cfd11 elementor-widget elementor-widget-heading" data-id="27cfd11" data-element_type="widget" data-widget_type="heading.default">
                    <h1 class="elementor-heading-title elementor-size-default">عن المنظمة</h1>
                </div>
                <div class="elementor-element elementor-element-c79d4b2 elementor-widget elementor-widget-text-editor" data-id="c79d4b2" data-element_type="widget" data-widget_type="text-editor.default">
                    <p>الاتحاد العالمي الأكاديمي للتزيين — منظمة دولية رائدة في تطوير مهنة التزيين والتجميل.</p>
                </div>
            </div>
            {{-- Breadcrumb --}}
            <div class="elementor-element elementor-element-bb72c7e e-con-full e-flex e-con e-child" data-id="bb72c7e" data-element_type="container">
                <div class="elementor-element elementor-element-ebf2dbf elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="ebf2dbf" data-element_type="widget" data-widget_type="icon-list.default">
                    <ul class="elementor-icon-list-items">
                        <li class="elementor-icon-list-item">
                            <a href="{{ route('home') }}">
                                <span class="elementor-icon-list-text">الرئيسية</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="elementor-element elementor-element-9951bac elementor-view-default elementor-widget elementor-widget-icon" data-id="9951bac" data-element_type="widget" data-widget_type="icon.default">
                    <div class="elementor-icon-wrapper">
                        <div class="elementor-icon">
                            <svg aria-hidden="true" class="e-font-icon-svg e-fas-chevron-circle-right" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 8c137 0 248 111 248 248S393 504 256 504 8 393 8 256 119 8 256 8zm113.9 231L234.4 103.5c-9.4-9.4-24.6-9.4-33.9 0l-17 17c-9.4 9.4-9.4 24.6 0 33.9L285.1 256 183.5 357.6c-9.4 9.4-9.4 24.6 0 33.9l17 17c9.4 9.4 24.6 9.4 33.9 0L369.9 273c9.4-9.4 9.4-24.6 0-34z"></path></svg>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-c8f1b02 elementor-widget elementor-widget-heading" data-id="c8f1b02" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-heading-title elementor-size-default">عن المنظمة</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ===== WHO WE ARE ===== --}}
<div class="elementor-element elementor-element-d3fe6b5 e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="d3fe6b5" data-element_type="container">
    <div class="e-con-inner">
        {{-- Text Column --}}
        <div class="elementor-element elementor-element-af26b8b e-con-full e-flex e-con e-child" data-id="af26b8b" data-element_type="container">
            <div class="elementor-element elementor-element-e356fc3 elementor-widget elementor-widget-heading" data-id="e356fc3" data-element_type="widget" data-widget_type="heading.default">
                <h2 class="elementor-heading-title elementor-size-default">من نحن</h2>
            </div>
            <div class="elementor-element elementor-element-fc5a3a9 elementor-widget elementor-widget-heading" data-id="fc5a3a9" data-element_type="widget" data-widget_type="heading.default">
                <h3 class="elementor-heading-title elementor-size-default">اكتشف قوة الاحتراف في مجال التزيين والتجميل</h3>
            </div>
            <div class="elementor-element elementor-element-89387f2 elementor-widget elementor-widget-text-editor" data-id="89387f2" data-element_type="widget" data-widget_type="text-editor.default">
                @if(isset($sections['intro']) && $sections['intro']->content_ar)
                    {!! nl2br(e($sections['intro']->content_ar)) !!}
                @else
                    <p>الاتحاد العالمي الأكاديمي للتزيين (C.M.A.C) منظمة دولية متخصصة في تعليم وتطوير مهنة التزيين والتجميل، تأسست قبل 25 عاماً وتضم في عضويتها خبراء ومتخصصين من أكثر من 50 دولة حول العالم.</p>
                    <p>تسعى المنظمة إلى رفع مستوى المهنة وتحقيق الاعتراف الدولي بها من خلال برامج تعليمية معتمدة ومعايير مهنية عالية وفعاليات دولية تجمع كبار المتخصصين.</p>
                @endif
            </div>
            {{-- Feature Icon Boxes --}}
            <div class="elementor-element elementor-element-83f201e e-con-full e-flex e-con e-child" data-id="83f201e" data-element_type="container">
                <div class="elementor-element elementor-element-dec1b42 elementor-widget__width-initial elementor-view-default elementor-position-block-start elementor-widget elementor-widget-icon-box" data-id="dec1b42" data-element_type="widget" data-widget_type="icon-box.default">
                    <div class="elementor-icon-box-wrapper">
                        <div class="elementor-icon-box-icon">
                            <span class="elementor-icon">
                                <svg class="ekit-svg-icon icon-certificate" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="28" height="28"><path d="M12 1a7 7 0 1 0 0 14A7 7 0 0 0 12 1zm0 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10z"/><path d="M9 15.5v6.2l3-1.5 3 1.5v-6.2a8.96 8.96 0 0 1-6 0z"/></svg>
                            </span>
                        </div>
                        <div class="elementor-icon-box-content">
                            <h4 class="elementor-icon-box-title"><span>معايير دولية</span></h4>
                            <p class="elementor-icon-box-description">برامج تدريبية تواكب أحدث التقنيات وتطبق أعلى المعايير العالمية.</p>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-0a44ed2 elementor-widget__width-initial elementor-view-default elementor-position-block-start elementor-widget elementor-widget-icon-box" data-id="0a44ed2" data-element_type="widget" data-widget_type="icon-box.default">
                    <div class="elementor-icon-box-wrapper">
                        <div class="elementor-icon-box-icon">
                            <span class="elementor-icon">
                                <svg class="ekit-svg-icon icon-team" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="28" height="28"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                            </span>
                        </div>
                        <div class="elementor-icon-box-content">
                            <h5 class="elementor-icon-box-title"><span>خبراء معتمدون</span></h5>
                            <p class="elementor-icon-box-description">فريق من أبرز خبراء التزيين والتجميل على المستوى الدولي.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Image column — نفس منطق/ستايل قسم «عن الاتحاد» في الصفحة الرئيسية (home → قسم عن الاتحاد) --}}
        <div class="elementor-element elementor-element-d5ed2c7 e-con-full e-flex e-con e-child" data-id="d5ed2c7" data-element_type="container">
            @php
                $imgMain = $ps('about', 'image_main', '');
                if ($imgMain === '' && isset($sections['intro']) && $sections['intro']->image) {
                    $imgMain = $sections['intro']->image;
                }
                if ($imgMain === '') {
                    $imgMain = 'skincare-concept-beautiful-black-woman-massaging-2026-03-24-02-24-58-utc2.webp';
                }
                $imgOverlay = $ps('about', 'image_overlay', 'girl-on-the-couch-at-the-beautician-2026-03-18-11-10-15-utc2.webp');
                $ctrVal = $ps('about', 'counter_value', '25');
                $ctrSuffix = $ps('about', 'counter_suffix', '+');
                $ctrLabel = $ps('about', 'counter_label', 'عاماً من التميز');
            @endphp
            <div class="elementor-element elementor-element-7231fb4 elementor-widget elementor-widget-image" data-id="7231fb4" data-element_type="widget" data-widget_type="image.default">
                <img src="{{ str_starts_with($imgMain, 'uploads/') ? Storage::url($imgMain) : asset('images/'.$imgMain) }}" class="attachment-full size-full" alt="عن المنظمة">
            </div>
            <div class="elementor-element elementor-element-aac0281 elementor-widget__width-initial elementor-absolute elementor-widget elementor-widget-image" data-id="aac0281" data-element_type="widget" data-widget_type="image.default" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}">
                <img src="{{ str_starts_with($imgOverlay, 'uploads/') ? Storage::url($imgOverlay) : asset('images/'.$imgOverlay) }}" class="attachment-full size-full" alt="خبراء">
            </div>
            <div class="elementor-element elementor-element-9389a0b e-con-full e-flex e-con e-child" data-id="9389a0b" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;position&quot;:&quot;absolute&quot;}">
                <div class="elementor-element elementor-element-efc66be elementor-widget elementor-widget-counter" data-id="efc66be" data-element_type="widget" data-widget_type="counter.default">
                    <div class="elementor-counter">
                        <div class="elementor-counter-number-wrapper">
                            <span class="elementor-counter-number-prefix"></span>
                            <span class="elementor-counter-number" data-duration="2000" data-to-value="{{ $ctrVal }}" data-from-value="0">{{ $ctrVal }}</span>
                            <span class="elementor-counter-number-suffix">{{ $ctrSuffix }}</span>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-ed85291 elementor-widget elementor-widget-heading" data-id="ed85291" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-heading-title elementor-size-default">{{ $ctrLabel }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ===== WHAT WE OFFER ===== --}}
<div class="elementor-element elementor-element-3bfbd41 e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="3bfbd41" data-element_type="container">
    <div class="e-con-inner">
        <div class="elementor-element elementor-element-1170805 e-flex e-con-boxed e-con e-child" data-id="1170805" data-element_type="container">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-40eb1cf elementor-widget elementor-widget-heading" data-id="40eb1cf" data-element_type="widget" data-widget_type="heading.default">
                    <h2 class="elementor-heading-title elementor-size-default">ما نقدمه</h2>
                </div>
                <div class="elementor-element elementor-element-4764c5c elementor-widget elementor-widget-heading" data-id="4764c5c" data-element_type="widget" data-widget_type="heading.default">
                    <h3 class="elementor-heading-title elementor-size-default">ارتقِ بمهنتك مع برامجنا المتكاملة</h3>
                </div>
                <div class="elementor-element elementor-element-ec00dd5 elementor-widget elementor-widget-text-editor" data-id="ec00dd5" data-element_type="widget" data-widget_type="text-editor.default">
                    <p>منظومة متكاملة من الخدمات التعليمية والمهنية ترفع مستوى الممارسين في مجال التزيين والتجميل.</p>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-63fc83f e-grid e-con-full e-con e-child" data-id="63fc83f" data-element_type="container">
            <div class="elementor-element elementor-element-db02c2e e-con-full e-flex e-con e-child" data-id="db02c2e" data-element_type="container">
                <div class="elementor-element elementor-element-8d1c9c0 e-transform elementor-position-top elementor-widget elementor-widget-image-box" data-id="8d1c9c0" data-element_type="widget" data-widget_type="image-box.default">
                    <div class="elementor-image-box-wrapper">
                        <figure class="elementor-image-box-img">
                            <a href="{{ route('education') }}">
                                <img src="{{ asset('images/016-face-1.png') }}" alt="المسارات التعليمية">
                            </a>
                        </figure>
                        <div class="elementor-image-box-content">
                            <h4 class="elementor-image-box-title"><a href="{{ route('education') }}">المسارات التعليمية</a></h4>
                            <p class="elementor-image-box-description">برامج تعليمية معتمدة دولياً تُأهّل المحترفين في التزيين والتجميل.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="elementor-element elementor-element-5141275 e-con-full e-flex e-con e-child" data-id="5141275" data-element_type="container">
                <div class="elementor-element elementor-element-b2ab045 e-transform elementor-position-top elementor-widget elementor-widget-image-box" data-id="b2ab045" data-element_type="widget" data-widget_type="image-box.default">
                    <div class="elementor-image-box-wrapper">
                        <figure class="elementor-image-box-img">
                            <a href="{{ route('awards') }}">
                                <img src="{{ asset('images/027-face-marking-1.png') }}" alt="الجوائز والأوسمة">
                            </a>
                        </figure>
                        <div class="elementor-image-box-content">
                            <h4 class="elementor-image-box-title"><a href="{{ route('awards') }}">الجوائز والأوسمة</a></h4>
                            <p class="elementor-image-box-description">جوائز دولية معترف بها تُكرّم المتميزين والمبدعين في المجال.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="elementor-element elementor-element-ea79f8a e-con-full e-flex e-con e-child" data-id="ea79f8a" data-element_type="container">
                <div class="elementor-element elementor-element-d195cbb e-transform elementor-position-top elementor-widget elementor-widget-image-box" data-id="d195cbb" data-element_type="widget" data-widget_type="image-box.default">
                    <div class="elementor-image-box-wrapper">
                        <figure class="elementor-image-box-img">
                            <a href="{{ route('events') }}">
                                <img src="{{ asset('images/001-cosmetic-surgery-1.png') }}" alt="الفعاليات الدولية">
                            </a>
                        </figure>
                        <div class="elementor-image-box-content">
                            <h4 class="elementor-image-box-title"><a href="{{ route('events') }}">الفعاليات الدولية</a></h4>
                            <p class="elementor-image-box-description">ملتقيات ومؤتمرات تجمع أبرز خبراء التزيين والجمال عالمياً.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="elementor-element elementor-element-bd81db3 e-con-full e-flex e-con e-child" data-id="bd81db3" data-element_type="container">
                <div class="elementor-element elementor-element-f8f0148 e-transform elementor-position-top elementor-widget elementor-widget-image-box" data-id="f8f0148" data-element_type="widget" data-widget_type="image-box.default">
                    <div class="elementor-image-box-wrapper">
                        <figure class="elementor-image-box-img">
                            <a href="{{ route('profession-day') }}">
                                <img src="{{ asset('images/009-liposuction-1.png') }}" alt="يوم المهنة العالمي">
                            </a>
                        </figure>
                        <div class="elementor-image-box-content">
                            <h4 class="elementor-image-box-title"><a href="{{ route('profession-day') }}">يوم المهنة العالمي</a></h4>
                            <p class="elementor-image-box-description">احتفال سنوي يكرّم مهنة التزيين في أكثر من 50 دولة.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ===== EXPERT CTA ===== --}}
<div class="elementor-element elementor-element-9e255a1 e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="9e255a1" data-element_type="container">
    <div class="e-con-inner">
        <div class="elementor-element elementor-element-9e82427 e-con-full e-flex e-con e-child" data-id="9e82427" data-element_type="container">
            <div class="elementor-element elementor-element-9a11db6 elementor-widget__width-initial elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="9a11db6" data-element_type="widget" data-widget_type="divider.default">
                <div class="elementor-divider"><span class="elementor-divider-separator"></span></div>
            </div>
            <div class="elementor-element elementor-element-d08e733 elementor-widget elementor-widget-heading" data-id="d08e733" data-element_type="widget" data-widget_type="heading.default">
                <h2 class="elementor-heading-title elementor-size-default">احترافية التزيين تبدأ من هنا</h2>
            </div>
            <div class="elementor-element elementor-element-cc7ee4d elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="cc7ee4d" data-element_type="widget" data-widget_type="text-editor.default">
                <p>انضم إلى آلاف المحترفين الذين اختاروا الاتحاد العالمي الأكاديمي للتزيين طريقاً لتطوير مهاراتهم والحصول على الاعتراف الدولي.</p>
            </div>
            <div class="elementor-element elementor-element-d716c54 elementor-align-center elementor-widget elementor-widget-button" data-id="d716c54" data-element_type="widget" data-widget_type="button.default">
                <a class="elementor-button elementor-button-link elementor-size-sm" href="{{ route('join') }}">
                    <span class="elementor-button-content-wrapper">
                        <span class="elementor-button-text">انضم إلينا الآن</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>



</div>{{-- end .elementor-1381 --}}

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/post-1381.css') }}">
<link rel="stylesheet" href="{{ asset('css/post-345.css') }}">
<style>
.about-brands-row {
    display: flex;
    flex-wrap: wrap;
    gap: 32px;
    align-items: center;
    justify-content: center;
    padding: 40px 0;
}
.about-brands-row img {
    max-height: 52px;
    width: auto;
    opacity: 0.6;
    filter: grayscale(1);
    transition: opacity 0.3s, filter 0.3s;
}
.about-brands-row img:hover {
    opacity: 1;
    filter: none;
}
/* أيقونات «من نحن» — كحلي غامق بدل الأبيض/اللون الافتراضي */
.elementor-1381 .elementor-element.elementor-element-dec1b42.elementor-view-default .elementor-icon,
.elementor-1381 .elementor-element.elementor-element-dec1b42.elementor-view-default .elementor-icon svg,
.elementor-1381 .elementor-element.elementor-element-dec1b42.elementor-view-default .elementor-icon svg path,
.elementor-1381 .elementor-element.elementor-element-0a44ed2.elementor-view-default .elementor-icon,
.elementor-1381 .elementor-element.elementor-element-0a44ed2.elementor-view-default .elementor-icon svg,
.elementor-1381 .elementor-element.elementor-element-0a44ed2.elementor-view-default .elementor-icon svg path {
    fill: #152238;
    color: #152238;
}
</style>
@endpush

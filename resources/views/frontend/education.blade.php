@extends('layouts.app')

@section('title', 'المسارات التعليمية')

@section('content')

@php
use App\Models\PageSection;
$ps = fn(string $section, string $key, string $default = '') =>
    PageSection::getValue('home', $section, $key, $default);
@endphp

<div class="elementor elementor-1671" dir="rtl">

{{-- ===== HERO / PAGE BANNER ===== --}}
<div class="elementor-element elementor-element-e7ed44a e-con-full e-flex e-con e-parent e-lazyloaded" data-id="e7ed44a" data-element_type="container">
    <div class="elementor-element elementor-element-7002764 e-con-full e-flex e-con e-child" data-id="7002764" data-element_type="container">
        <div class="elementor-element elementor-element-2277a09 e-con-full e-flex e-con e-child" data-id="2277a09" data-element_type="container">
            {{-- Title --}}
            <div class="elementor-element elementor-element-2e52210 e-con-full e-flex e-con e-child" data-id="2e52210" data-element_type="container">
                <div class="elementor-element elementor-element-d0fff18 elementor-widget elementor-widget-heading" data-id="d0fff18" data-element_type="widget" data-widget_type="heading.default">
                    <h1 class="elementor-heading-title elementor-size-default">المسارات التعليمية</h1>
                </div>
                <div class="elementor-element elementor-element-4ab1c7e elementor-widget elementor-widget-text-editor" data-id="4ab1c7e" data-element_type="widget" data-widget_type="text-editor.default">
                    <p>برامج تعليمية معتمدة دولياً تُأهّل المحترفين في مجال التزيين والتجميل.</p>
                </div>
            </div>
            {{-- Breadcrumb --}}
            <div class="elementor-element elementor-element-f78560f e-con-full e-flex e-con e-child" data-id="f78560f" data-element_type="container">
                <div class="elementor-element elementor-element-20ad731 elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="20ad731" data-element_type="widget" data-widget_type="icon-list.default">
                    <ul class="elementor-icon-list-items">
                        <li class="elementor-icon-list-item">
                            <a href="{{ route('home') }}">
                                <span class="elementor-icon-list-text">الرئيسية</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="elementor-element elementor-element-446b914 elementor-view-default elementor-widget elementor-widget-icon" data-id="446b914" data-element_type="widget" data-widget_type="icon.default">
                    <div class="elementor-icon-wrapper">
                        <div class="elementor-icon">
                            <svg aria-hidden="true" class="e-font-icon-svg e-fas-chevron-circle-right" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 8c137 0 248 111 248 248S393 504 256 504 8 393 8 256 119 8 256 8zm113.9 231L234.4 103.5c-9.4-9.4-24.6-9.4-33.9 0l-17 17c-9.4 9.4-9.4 24.6 0 33.9L285.1 256 183.5 357.6c-9.4 9.4-9.4 24.6 0 33.9l17 17c9.4 9.4 24.6 9.4 33.9 0L369.9 273c9.4-9.4 9.4-24.6 0-34z"></path></svg>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-9df9bd0 elementor-widget elementor-widget-heading" data-id="9df9bd0" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-heading-title elementor-size-default">المسارات التعليمية</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ===== برامجنا التعليمية — نفس قسم الخدمات في الرئيسية (الصفحات → الرئيسية → قسم الخدمات) ===== --}}
<div class="elementor-element elementor-element-1720f93 e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="1720f93" data-element_type="container">
    <div class="e-con-inner">
        <div class="elementor-element elementor-element-9435911 e-flex e-con-boxed e-con e-child" data-id="9435911" data-element_type="container">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-60fcd2b elementor-widget elementor-widget-heading" data-id="60fcd2b" data-element_type="widget" data-widget_type="heading.default">
                    <h2 class="elementor-heading-title elementor-size-default">{{ $ps('services', 'badge', 'برامجنا التعليمية') }}</h2>
                </div>
                <div class="elementor-element elementor-element-d7b0d1f elementor-widget elementor-widget-heading" data-id="d7b0d1f" data-element_type="widget" data-widget_type="heading.default">
                    <h3 class="elementor-heading-title elementor-size-default">{{ $ps('services', 'title', 'مساراتنا التعليمية والمهنية') }}</h3>
                </div>
                <div class="elementor-element elementor-element-65938fe elementor-widget elementor-widget-text-editor" data-id="65938fe" data-element_type="widget" data-widget_type="text-editor.default">
                    <p>{{ $ps('services', 'description', 'نقدم برامج تدريبية معتمدة دولياً في مجال التزيين والتجميل.') }}</p>
                </div>
            </div>
        </div>

        <div class="elementor-element elementor-element-6cdca64 e-con-full e-flex e-con e-child" data-id="6cdca64" data-element_type="container">
            <div class="elementor-element elementor-element-4333bdd e-con-full e-flex e-con e-child" data-id="4333bdd" data-element_type="container">
                <div class="elementor-element elementor-element-d73d404 elementor-position-top elementor-widget elementor-widget-image-box" data-id="d73d404" data-element_type="widget" data-widget_type="image-box.default">
                    <div class="elementor-image-box-wrapper">
                        <figure class="elementor-image-box-img">
                            <span class="cmac-service-icon" role="img" aria-label="{{ $ps('services', 'card1_title', 'التأهيل المهني') }}"><i class="fas fa-user-graduate" aria-hidden="true"></i></span>
                        </figure>
                        <div class="elementor-image-box-content">
                            <h4 class="elementor-image-box-title"><a href="{{ route('education.category', 'taheel') }}">{{ $ps('services', 'card1_title', 'التأهيل المهني') }}</a></h4>
                            <p class="elementor-image-box-description">{{ $ps('services', 'card1_desc', 'برامج أساسية لتأهيل المبتدئين وفق أعلى المعايير المهنية الدولية.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-2e33600 elementor-position-top elementor-widget elementor-widget-image-box" data-id="2e33600" data-element_type="widget" data-widget_type="image-box.default">
                    <div class="elementor-image-box-wrapper">
                        <figure class="elementor-image-box-img">
                            <span class="cmac-service-icon" role="img" aria-label="{{ $ps('services', 'card2_title', 'التطوير المهني') }}"><i class="fas fa-chart-line" aria-hidden="true"></i></span>
                        </figure>
                        <div class="elementor-image-box-content">
                            <h4 class="elementor-image-box-title"><a href="{{ route('education.category', 'tatweer') }}">{{ $ps('services', 'card2_title', 'التطوير المهني') }}</a></h4>
                            <p class="elementor-image-box-description">{{ $ps('services', 'card2_desc', 'برامج متقدمة للمحترفين الذين يسعون لرفع مستواهم والتميز الدولي.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-b9be4e8 elementor-position-top elementor-widget elementor-widget-image-box" data-id="b9be4e8" data-element_type="widget" data-widget_type="image-box.default">
                    <div class="elementor-image-box-wrapper">
                        <figure class="elementor-image-box-img">
                            <span class="cmac-service-icon" role="img" aria-label="{{ $ps('services', 'card3_title', 'الشهادات المعتمدة') }}"><i class="fas fa-certificate" aria-hidden="true"></i></span>
                        </figure>
                        <div class="elementor-image-box-content">
                            <h4 class="elementor-image-box-title"><a href="{{ route('education.category', 'certificates') }}">{{ $ps('services', 'card3_title', 'الشهادات المعتمدة') }}</a></h4>
                            <p class="elementor-image-box-description">{{ $ps('services', 'card3_desc', 'شهادات مهنية معترف بها دولياً في مختلف تخصصات التجميل.') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="elementor-element elementor-element-1396c29 e-con-full e-flex e-con e-child" data-id="1396c29" data-element_type="container">
                <div class="elementor-element elementor-element-12468e9 elementor-widget elementor-widget-image" data-id="12468e9" data-element_type="widget" data-widget_type="image.default">
                    @php $centerImg = $ps('services', 'center_image', '5a8fc8f0-ed0d-4294-93ec-e740287c5085-2026-04-24-2.webp'); @endphp
                    <img src="{{ str_starts_with($centerImg, 'uploads/') ? Storage::url($centerImg) : asset('images/'.$centerImg) }}" alt="CMAC" style="width:60%;object-fit:cover;">
                </div>
                <div class="elementor-element elementor-element-34976ca elementor-widget__width-initial elementor-absolute elementor-widget elementor-widget-image" data-id="34976ca" data-element_type="widget" data-widget_type="image.default">
                    <img src="{{ asset('images/Decoration-3.png') }}" alt="">
                </div>
            </div>

            <div class="elementor-element elementor-element-a4a3a55 e-con-full e-flex e-con e-child" data-id="a4a3a55" data-element_type="container">
                <div class="elementor-element elementor-element-e0fdd08 elementor-position-top elementor-widget elementor-widget-image-box" data-id="e0fdd08" data-element_type="widget" data-widget_type="image-box.default">
                    <div class="elementor-image-box-wrapper">
                        <figure class="elementor-image-box-img">
                            <span class="cmac-service-icon" role="img" aria-label="{{ $ps('services', 'card4_title', 'الفعاليات الدولية') }}"><i class="fas fa-calendar-alt" aria-hidden="true"></i></span>
                        </figure>
                        <div class="elementor-image-box-content">
                            <h4 class="elementor-image-box-title"><a href="{{ route('events') }}">{{ $ps('services', 'card4_title', 'الفعاليات الدولية') }}</a></h4>
                            <p class="elementor-image-box-description">{{ $ps('services', 'card4_desc', 'ملتقيات ومؤتمرات دولية تجمع أبرز المتخصصين والخبراء.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-c27edbb elementor-position-top elementor-widget elementor-widget-image-box" data-id="c27edbb" data-element_type="widget" data-widget_type="image-box.default">
                    <div class="elementor-image-box-wrapper">
                        <figure class="elementor-image-box-img">
                            <span class="cmac-service-icon" role="img" aria-label="{{ $ps('services', 'card5_title', 'الجوائز والأوسمة') }}"><i class="fas fa-trophy" aria-hidden="true"></i></span>
                        </figure>
                        <div class="elementor-image-box-content">
                            <h4 class="elementor-image-box-title"><a href="{{ route('awards') }}">{{ $ps('services', 'card5_title', 'الجوائز والأوسمة') }}</a></h4>
                            <p class="elementor-image-box-description">{{ $ps('services', 'card5_desc', 'نكرّم المتميزين والمبدعين بجوائز ووسامات دولية معترف بها.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-0c5d386 elementor-position-top elementor-widget elementor-widget-image-box" data-id="0c5d386" data-element_type="widget" data-widget_type="image-box.default">
                    <div class="elementor-image-box-wrapper">
                        <figure class="elementor-image-box-img">
                            <span class="cmac-service-icon" role="img" aria-label="يوم المهنة العالمي"><i class="fas fa-briefcase" aria-hidden="true"></i></span>
                        </figure>
                        <div class="elementor-image-box-content">
                            <h4 class="elementor-image-box-title"><a href="{{ route('profession-day') }}">يوم المهنة العالمي</a></h4>
                            <p class="elementor-image-box-description">احتفال سنوي دولي يكرّم مهنة التزيين في أكثر من 50 دولة.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ===== CTA + WHY CHOOSE US ===== --}}
<div class="elementor-element elementor-element-36a42e1 e-con-full e-flex e-con e-parent e-lazyloaded" data-id="36a42e1" data-element_type="container">
    {{-- CTA / Join Section --}}
    <div class="elementor-element elementor-element-c59a0d1 e-flex e-con-boxed e-con e-child" data-id="c59a0d1" data-element_type="container">
        <div class="e-con-inner">
            <div class="elementor-element elementor-element-94ade2b e-con-full e-flex e-con e-child" data-id="94ade2b" data-element_type="container">
                <div class="elementor-element elementor-element-705de78 elementor-widget elementor-widget-heading" data-id="705de78" data-element_type="widget" data-widget_type="heading.default">
                    <h2 class="elementor-heading-title elementor-size-default">احترافيتك تبدأ من التعليم الصحيح</h2>
                </div>
                <div class="elementor-element elementor-element-75cd554 elementor-widget elementor-widget-text-editor" data-id="75cd554" data-element_type="widget" data-widget_type="text-editor.default">
                    <p>سجّل الآن في أحد برامجنا المعتمدة وابدأ رحلتك نحو الاحتراف والتميز في مجال التزيين والتجميل.</p>
                </div>
                <div class="elementor-element elementor-element-73c5c52 elementor-mobile-align-center elementor-widget elementor-widget-button" data-id="73c5c52" data-element_type="widget" data-widget_type="button.default">
                    <a class="elementor-button elementor-button-link elementor-size-sm" href="{{ route('join') }}">
                        <span class="elementor-button-content-wrapper">
                            <span class="elementor-button-text">سجّل الآن</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- لماذا تختار الاتحاد — نفس قسم الرئيسية (الصفحات → الرئيسية → لماذا تختار الاتحاد؟) --}}
    <div class="elementor-element elementor-element-38743b0 e-flex e-con-boxed e-con e-child" data-id="38743b0" data-element_type="container">
        <div class="e-con-inner">
            <div class="elementor-element elementor-element-632950b e-con-full e-flex e-con e-child" data-id="632950b" data-element_type="container">
                <div class="elementor-element elementor-element-37b9e7d elementor-widget elementor-widget-heading" data-id="37b9e7d" data-element_type="widget" data-widget_type="heading.default">
                    <h2 class="elementor-heading-title elementor-size-default">{{ $ps('why_us', 'title', 'لماذا تختار الاتحاد؟') }}</h2>
                </div>
                <div class="elementor-element elementor-element-df1c7c0 elementor-widget elementor-widget-heading" data-id="df1c7c0" data-element_type="widget" data-widget_type="heading.default">
                    <h3 class="elementor-heading-title elementor-size-default">{{ $ps('why_us', 'subtitle', 'حيث الاحتراف يلتقي بالاعتراف الدولي') }}</h3>
                </div>
                <div class="elementor-element elementor-element-a9c98bf elementor-widget elementor-widget-text-editor" data-id="a9c98bf" data-element_type="widget" data-widget_type="text-editor.default">
                    <p>{{ $ps('why_us', 'intro', 'نقدم بيئة تعليمية متميزة وشبكة علاقات دولية تفتح آفاقاً جديدة أمام المحترفين في مجال التزيين والتجميل.') }}</p>
                </div>
                <div class="elementor-element elementor-element-679f6d3 elementor-view-stacked elementor-position-inline-start elementor-shape-circle elementor-widget elementor-widget-icon-box" data-id="679f6d3" data-element_type="widget" data-widget_type="icon-box.default">
                    <div class="elementor-icon-box-wrapper">
                        <div class="elementor-icon-box-icon"><span class="elementor-icon">
                            <svg class="ekit-svg-icon icon-certificate" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="22" height="22">
                                <path d="M12 1a7 7 0 1 0 0 14A7 7 0 0 0 12 1zm0 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10z"/>
                                <path d="M9 15.5v6.2l3-1.5 3 1.5v-6.2a8.96 8.96 0 0 1-6 0z"/>
                            </svg>
                        </span></div>
                        <div class="elementor-icon-box-content">
                            <div class="elementor-icon-box-title"><span>{{ $ps('why_us', 'item1_title', 'اعتماد دولي معترف به') }}</span></div>
                            <p class="elementor-icon-box-description">{{ $ps('why_us', 'item1_desc', 'شهادات معتمدة وفق أعلى المعايير الدولية في مجال التزيين والتجميل.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-99f44de elementor-view-stacked elementor-position-inline-start elementor-shape-circle elementor-widget elementor-widget-icon-box" data-id="99f44de" data-element_type="widget" data-widget_type="icon-box.default">
                    <div class="elementor-icon-box-wrapper">
                        <div class="elementor-icon-box-icon"><span class="elementor-icon">
                            <svg class="ekit-svg-icon icon-globe" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="22" height="22">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                            </svg>
                        </span></div>
                        <div class="elementor-icon-box-content">
                            <div class="elementor-icon-box-title"><span>{{ $ps('why_us', 'item2_title', 'شبكة عالمية واسعة') }}</span></div>
                            <p class="elementor-icon-box-description">{{ $ps('why_us', 'item2_desc', 'تواصل مع خبراء ومتخصصين من أكثر من 50 دولة حول العالم.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-b98def1 elementor-view-stacked elementor-position-inline-start elementor-shape-circle elementor-widget elementor-widget-icon-box" data-id="b98def1" data-element_type="widget" data-widget_type="icon-box.default">
                    <div class="elementor-icon-box-wrapper">
                        <div class="elementor-icon-box-icon"><span class="elementor-icon">
                            <svg class="ekit-svg-icon icon-team" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="22" height="22">
                                <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                            </svg>
                        </span></div>
                        <div class="elementor-icon-box-content">
                            <div class="elementor-icon-box-title"><span>{{ $ps('why_us', 'item3_title', 'دعم متواصل') }}</span></div>
                            <p class="elementor-icon-box-description">{{ $ps('why_us', 'item3_desc', 'فريق متخصص لدعمك في رحلتك نحو الاحتراف والتميز الدولي.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="elementor-element elementor-element-8e0edad e-con-full e-flex e-con e-child" data-id="8e0edad" data-element_type="container">
                <div class="elementor-element elementor-element-c2706d3 elementor-widget elementor-widget-image" data-id="c2706d3" data-element_type="widget" data-widget_type="image.default">
                    @php
                        $whySideImgRaw = $ps('why_us', 'side_image', '');
                        $whyImgUrl = $whySideImgRaw !== ''
                            ? (str_starts_with($whySideImgRaw, 'uploads/') ? Storage::url($whySideImgRaw) : asset('images/'.$whySideImgRaw))
                            : asset('images/shot-of-a-happy-young-woman-applying-moisturiser-a-2026-01-09-09-21-08-utc2-transformed.webp');
                    @endphp
                    <img src="{{ $whyImgUrl }}" alt="{{ $ps('why_us', 'title', 'C.M.A.C') }}" style="width:100%;height:100%;object-fit:cover;border-radius:20px;">
                </div>
            </div>
        </div>
    </div>
</div>

</div>{{-- end .elementor-1671 --}}

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/post-1671.css') }}">
<style>
/* بطاقات الخدمات — نفس سلوك الرئيسية (elementor-265) ضمن صفحة التعليم */
.elementor-1671 .elementor-widget-image-box .elementor-image-box-wrapper,
.elementor-1671 .elementor-widget-image-box .elementor-image-box-content {
    text-align: start !important;
}
.elementor-1671 figure.elementor-image-box-img {
    margin: 0 0 12px 0;
    display: flex;
    justify-content: flex-start;
    align-items: center;
}
.elementor-1671 .cmac-service-icon {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: var(--e-global-color-651faef, #DEEFF8);
    color: var(--e-global-color-secondary, #2166A9);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1.45rem;
    line-height: 1;
    flex-shrink: 0;
}
.elementor-1671 .cmac-service-icon i { line-height: 1; }
.elementor-1671 .elementor-icon-box-content { text-align: right !important; }
.ekit-svg-icon { display: inline-block; vertical-align: middle; }
</style>
@endpush

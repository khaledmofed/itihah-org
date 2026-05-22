@extends('layouts.app')

@section('title', 'تواصل معنا')

@section('content')

<div class="elementor elementor-822" dir="rtl">

{{-- ===== HERO / PAGE BANNER ===== --}}
<div class="elementor-element elementor-element-165bb83 e-con-full e-flex e-con e-parent e-lazyloaded" data-id="165bb83" data-element_type="container">
    <div class="elementor-element elementor-element-7978ab7 e-con-full e-flex e-con e-child" data-id="7978ab7" data-element_type="container">
        <div class="elementor-element elementor-element-14bf685 e-con-full e-flex e-con e-child" data-id="14bf685" data-element_type="container">
            <div class="elementor-element elementor-element-2988a8e e-con-full e-flex e-con e-child" data-id="2988a8e" data-element_type="container">
                {{-- Title --}}
                <div class="elementor-element elementor-element-6834fbd elementor-widget elementor-widget-heading" data-id="6834fbd" data-element_type="widget" data-widget_type="heading.default">
                    <h1 class="elementor-heading-title elementor-size-default">تواصل معنا</h1>
                </div>
                {{-- Description --}}
                <div class="elementor-element elementor-element-a4e578d elementor-widget elementor-widget-text-editor" data-id="a4e578d" data-element_type="widget" data-widget_type="text-editor.default">
                    <p>يسعدنا التواصل معكم للإجابة على استفساراتكم والترحيب بكم في عائلة الاتحاد العالمي الأكاديمي للتزيين.</p>
                </div>
            </div>
            {{-- Breadcrumb --}}
            <div class="elementor-element elementor-element-6435d44 e-con-full e-flex e-con e-child" data-id="6435d44" data-element_type="container">
                <div class="elementor-element elementor-element-f329282 elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="f329282" data-element_type="widget" data-widget_type="icon-list.default">
                    <ul class="elementor-icon-list-items">
                        <li class="elementor-icon-list-item">
                            <a href="{{ route('home') }}">
                                <span class="elementor-icon-list-text">الرئيسية</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="elementor-element elementor-element-da6cde8 elementor-view-default elementor-widget elementor-widget-icon" data-id="da6cde8" data-element_type="widget" data-widget_type="icon.default">
                    <div class="elementor-icon-wrapper">
                        <div class="elementor-icon">
                            <svg aria-hidden="true" class="e-font-icon-svg e-fas-chevron-circle-right" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 8c137 0 248 111 248 248S393 504 256 504 8 393 8 256 119 8 256 8zm113.9 231L234.4 103.5c-9.4-9.4-24.6-9.4-33.9 0l-17 17c-9.4 9.4-9.4 24.6 0 33.9L285.1 256 183.5 357.6c-9.4 9.4-9.4 24.6 0 33.9l17 17c9.4 9.4 24.6 9.4 33.9 0L369.9 273c9.4-9.4 9.4-24.6 0-34z"></path></svg>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-875c4ac elementor-widget elementor-widget-jkit_post_title" data-id="875c4ac" data-element_type="widget" data-widget_type="jkit_post_title.default">
                    <div class="jeg-elementor-kit jkit-post-title">
                        <div class="post-title style-color">تواصل معنا</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ===== APPOINTMENT / CONTACT ===== --}}
<div class="elementor-element elementor-element-6c23bbc e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="6c23bbc" data-element_type="container" style="
    padding-top: 90px;
    padding-bottom: 60px;
">
    <div class="e-con-inner">

        {{-- Form side (d9e4573) --}}
        <div class="elementor-element elementor-element-d9e4573 e-flex e-con-boxed e-con e-child" data-id="d9e4573" data-element_type="container">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-a8c57c8 e-con-full e-flex e-con e-child animated fadeInUp" data-id="a8c57c8" data-element_type="container">

                    @if(session('appointment_success'))
                    <div style="background:#d1fae5;border-radius:10px;padding:14px 18px;margin-bottom:18px;color:#065f46;font-size:14px;width:100%;">
                        {{ session('appointment_success') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('appointment.submit') }}" style="width:100%;">
                        @csrf

                        {{-- Row 1: Name --}}
                        <div class="elementor-element elementor-element-308d783 e-con-full e-flex e-con e-child" data-id="308d783" data-element_type="container">
                            <div class="elementor-element elementor-element-872bf63 elementor-widget elementor-widget-mf-text" data-id="872bf63" data-element_type="widget">
                                <div class="mf-input-wrapper">
                                    <label class="mf-input-label" for="mf-name">الاسم الكامل <span class="mf-input-required-indicator">*</span></label>
                                    <input type="text" class="mf-input" id="mf-name" name="name" value="{{ old('name') }}" placeholder="اسمك الكامل" required>
                                </div>
                            </div>
                        </div>

                        {{-- Row 2: Email + Phone --}}
                        <div class="elementor-element elementor-element-8bb95be e-con-full e-flex e-con e-child" data-id="8bb95be" data-element_type="container">
                            <div class="elementor-element elementor-element-bb52721 elementor-widget__width-initial elementor-widget elementor-widget-mf-email" data-id="bb52721" data-element_type="widget">
                                <div class="mf-input-wrapper">
                                    <label class="mf-input-label" for="mf-email">البريد الإلكتروني <span class="mf-input-required-indicator">*</span></label>
                                    <input type="email" class="mf-input" id="mf-email" name="email" value="{{ old('email') }}" placeholder="your@email.com" required>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-8457e44 elementor-widget__width-initial elementor-widget elementor-widget-mf-telephone" data-id="8457e44" data-element_type="widget">
                                <div class="mf-input-wrapper">
                                    <label class="mf-input-label" for="mf-phone">الهاتف</label>
                                    <input type="tel" class="mf-input" id="mf-phone" name="phone" value="{{ old('phone') }}" placeholder="+971 50 000 0000">
                                </div>
                            </div>
                        </div>

                        {{-- Row 3: Date + Time --}}
                        <div class="elementor-element elementor-element-bb3961e e-con-full e-flex e-con e-child" data-id="bb3961e" data-element_type="container">
                            <div class="elementor-element elementor-element-f302977 elementor-widget__width-initial elementor-widget elementor-widget-mf-date" data-id="f302977" data-element_type="widget">
                                <div class="mf-input-wrapper">
                                    <label class="mf-input-label" for="mf-date">التاريخ</label>
                                    <div class="flatpickr-wrapper">
                                        <input name="appointment_date" id="mf-date" class="mf-input mf-date-input" placeholder="يوم - شهر - سنة" value="{{ old('appointment_date') }}" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-b5f506f elementor-widget__width-initial elementor-widget elementor-widget-mf-time" data-id="b5f506f" data-element_type="widget">
                                <div class="mf-input-wrapper">
                                    <label class="mf-input-label" for="mf-time">الوقت</label>
                                    <div class="flatpickr-wrapper">
                                        <input name="appointment_time" id="mf-time" class="mf-input mf-date-input mf-time-input" placeholder="الوقت" value="{{ old('appointment_time') }}" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Row 4: Message + Submit --}}
                        <div class="elementor-element elementor-element-1bd3453 e-con-full e-flex e-con e-child" data-id="1bd3453" data-element_type="container">
                            <div class="elementor-element elementor-element-469251b elementor-widget elementor-widget-mf-textarea" data-id="469251b" data-element_type="widget">
                                <div class="mf-input-wrapper">
                                    <label class="mf-input-label" for="mf-message">الرسالة</label>
                                    <textarea class="mf-input mf-textarea" id="mf-message" name="message" placeholder="رسالتك..." rows="5">{{ old('message') }}</textarea>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-9273fb1 mf-btn--left elementor-widget elementor-widget-mf-button" data-id="9273fb1" data-element_type="widget">
                                <div class="mf-btn-wraper">
                                    <button type="submit" class="metform-btn metform-submit-btn">
                                        <span>{{ $siteSettings->get('appointment_btn_text', 'احجز موعدك') }}</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                {{-- Info side (d0dcc7a) --}}
        <div class="elementor-element elementor-element-d0dcc7a e-con-full e-flex e-con e-child" data-id="d0dcc7a" data-element_type="container">

            <div class="elementor-element elementor-element-b650c02 elementor-widget elementor-widget-heading animated fadeInRight" data-id="b650c02" data-element_type="widget" data-settings='{"_animation":"fadeInRight"}'>
                <h2 class="elementor-heading-title elementor-size-default">{{ $siteSettings->get('appointment_title_ar', 'احجز موعدك') }}</h2>
            </div>

            <div class="elementor-element elementor-element-3a94b2b elementor-widget elementor-widget-heading animated fadeInUp" data-id="3a94b2b" data-element_type="widget" data-settings='{"_animation":"fadeInUp"}'>
                <h3 class="elementor-heading-title elementor-size-default">{{ $siteSettings->get('appointment_subtitle_ar', 'خطوة نحو التميز المهني') }}</h3>
            </div>

            <div class="elementor-element elementor-element-43fb558 elementor-widget elementor-widget-text-editor" data-id="43fb558" data-element_type="widget">
                <p>{{ $siteSettings->get('appointment_desc_ar', 'انضم إلى الاتحاد العالمي الأكاديمي للتزيين وارتقِ بمسيرتك المهنية على المستوى الدولي. فريقنا جاهز للإجابة على استفساراتك.') }}</p>
            </div>

            <div class="elementor-element elementor-element-4c7ec68 elementor-widget elementor-widget-heading" data-id="4c7ec68" data-element_type="widget">
                <h4 class="elementor-heading-title elementor-size-default">ساعات العمل:</h4>
            </div>

            {{-- Opening Hours List --}}
            <div class="elementor-element elementor-element-ac3a876 e-con-full e-flex e-con e-child" data-id="ac3a876" data-element_type="container">

                <div class="elementor-element elementor-element-f66198d elementor-widget elementor-widget-heading" data-id="f66198d" data-element_type="widget">
                    <p class="elementor-heading-title elementor-size-default">الإثنين — الجمعة</p>
                </div>
                <div class="elementor-element elementor-element-0678ae8 elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="0678ae8" data-element_type="widget">
                    <ul class="elementor-icon-list-items">
                        <li class="elementor-icon-list-item">
                            <span class="elementor-icon-list-icon">
                                <svg aria-hidden="true" class="e-font-icon-svg e-far-clock" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"></path></svg>
                            </span>
                            <span class="elementor-icon-list-text">{{ $siteSettings->get('hours_weekdays', '08:00 ص — 20:00 م') }}</span>
                        </li>
                    </ul>
                </div>
                <div class="elementor-element elementor-element-38097f5 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="38097f5" data-element_type="widget">
                    <div class="elementor-divider"><span class="elementor-divider-separator"></span></div>
                </div>

                <div class="elementor-element elementor-element-6616ba7 elementor-widget elementor-widget-heading" data-id="6616ba7" data-element_type="widget">
                    <p class="elementor-heading-title elementor-size-default">السبت</p>
                </div>
                <div class="elementor-element elementor-element-31b6101 elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="31b6101" data-element_type="widget">
                    <ul class="elementor-icon-list-items">
                        <li class="elementor-icon-list-item">
                            <span class="elementor-icon-list-icon">
                                <svg aria-hidden="true" class="e-font-icon-svg e-far-clock" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"></path></svg>
                            </span>
                            <span class="elementor-icon-list-text">{{ $siteSettings->get('hours_saturday', '08:00 ص — 15:00 م') }}</span>
                        </li>
                    </ul>
                </div>
                <div class="elementor-element elementor-element-a15fab2 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="a15fab2" data-element_type="widget">
                    <div class="elementor-divider"><span class="elementor-divider-separator"></span></div>
                </div>

                <div class="elementor-element elementor-element-f1fbc80 elementor-widget elementor-widget-heading" data-id="f1fbc80" data-element_type="widget">
                    <p class="elementor-heading-title elementor-size-default">الأحد</p>
                </div>
                <div class="elementor-element elementor-element-b736b30 elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="b736b30" data-element_type="widget">
                    <ul class="elementor-icon-list-items">
                        <li class="elementor-icon-list-item">
                            <span class="elementor-icon-list-icon">
                                <svg aria-hidden="true" class="e-font-icon-svg e-far-clock" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"></path></svg>
                            </span>
                            <span class="elementor-icon-list-text">{{ $siteSettings->get('hours_sunday', 'مغلق') }}</span>
                        </li>
                    </ul>
                </div>

            </div>{{-- end ac3a876 --}}

            {{-- Contact Support button --}}
            <!-- <div class="elementor-element elementor-element-5607e6b elementor-widget elementor-widget-button" data-id="5607e6b" data-element_type="widget">
                <a class="elementor-button elementor-button-link elementor-size-sm" href="{{ route('contact') }}">
                    <span class="elementor-button-content-wrapper">
                        <span class="elementor-button-text">تواصل معنا</span>
                    </span>
                </a>
            </div> -->

            {{-- Decorative image (absolute) --}}
            <div class="elementor-element elementor-element-d074bc9 elementor-widget__width-initial elementor-absolute elementor-widget elementor-widget-image" data-id="d074bc9" data-element_type="widget" data-settings='{"_position":"absolute"}'>
                <img loading="lazy" src="{{ asset('images/pngegg-2.png') }}" width="500" height="500" alt="">
            </div>

        </div>{{-- end d0dcc7a --}}
            </div>
        </div>

    </div>
</div>

{{-- ===== MAP ===== --}}
<div class="elementor-element elementor-element-2ef4dd4 e-con-full e-flex e-con e-parent e-lazyloaded" data-id="2ef4dd4" data-element_type="container">
    <div class="elementor-element elementor-element-2c286ad elementor-widget elementor-widget-google_maps" data-id="2c286ad" data-element_type="widget" data-widget_type="google_maps.default">
        <div class="elementor-custom-embed">
            <iframe loading="lazy" src="https://maps.google.com/maps?q=Dubai,+UAE&t=&z=13&ie=UTF8&iwloc=&output=embed" title="دبي، الإمارات العربية المتحدة" aria-label="موقع الاتحاد - دبي" style="border:0;width:100%;height:400px;"></iframe>
        </div>
    </div>
</div>

</div>{{-- end .elementor-822 --}}

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/post-822.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/cutisure/metform-ui.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/cutisure/flatpickr.min.css') }}">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('mf-date')) {
        flatpickr('#mf-date', { dateFormat: 'Y-m-d', allowInput: true });
    }
    if (document.getElementById('mf-time')) {
        flatpickr('#mf-time', { enableTime: true, noCalendar: true, dateFormat: 'H:i', time_24hr: true, allowInput: true });
    }
});
</script>
@endpush

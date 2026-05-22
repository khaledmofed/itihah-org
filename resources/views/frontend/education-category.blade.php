@extends('layouts.app')

@section('title', $label)

@section('content')

<div class="elementor elementor-2087" dir="rtl">

{{-- ===== HERO / PAGE BANNER ===== --}}
<div class="elementor-element elementor-element-2757a9b e-con-full e-flex e-con e-parent e-lazyloaded" data-id="2757a9b" data-element_type="container">
    <div class="elementor-element elementor-element-5320bea e-con-full e-flex e-con e-child" data-id="5320bea" data-element_type="container">
        <div class="elementor-element elementor-element-e54f511 e-con-full e-flex e-con e-child" data-id="e54f511" data-element_type="container">
            <div class="elementor-element elementor-element-8eabebf e-con-full e-flex e-con e-child" data-id="8eabebf" data-element_type="container">
                {{-- Title --}}
                <div class="elementor-element elementor-element-35b4fb2 elementor-widget elementor-widget-heading" data-id="35b4fb2" data-element_type="widget" data-widget_type="heading.default">
                    <h1 class="elementor-heading-title elementor-size-default">{{ $label }}</h1>
                </div>
                {{-- Description --}}
                <div class="elementor-element elementor-element-183c112 elementor-widget elementor-widget-text-editor" data-id="183c112" data-element_type="widget" data-widget_type="text-editor.default">
                    @if($category === 'taheel')
                        <p>برامج تأهيل احترافية معتمدة دولياً للراغبين في دخول عالم التزيين والتجميل بأساس علمي وعملي متين.</p>
                    @elseif($category === 'tatweer')
                        <p>برامج تطوير مهني مصممة للمختصين الساعين إلى رفع كفاءاتهم والارتقاء بمستوى خدماتهم.</p>
                    @else
                        <p>شهادات معتمدة دولياً تُعزّز مكانتك المهنية وتفتح أمامك آفاقاً جديدة في سوق العمل العالمي.</p>
                    @endif
                </div>
            </div>
            {{-- Breadcrumb --}}
            <div class="elementor-element elementor-element-7362c25 e-con-full e-flex e-con e-child" data-id="7362c25" data-element_type="container">
                <div class="elementor-element elementor-element-73f7ffd elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="73f7ffd" data-element_type="widget" data-widget_type="icon-list.default">
                    <ul class="elementor-icon-list-items">
                        <li class="elementor-icon-list-item">
                            <a href="{{ route('home') }}">
                                <span class="elementor-icon-list-text">الرئيسية</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="elementor-element elementor-element-d778e02 elementor-view-default elementor-widget elementor-widget-icon" data-id="d778e02" data-element_type="widget" data-widget_type="icon.default">
                    <div class="elementor-icon-wrapper">
                        <div class="elementor-icon">
                            <svg aria-hidden="true" class="e-font-icon-svg e-fas-chevron-circle-right" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 8c137 0 248 111 248 248S393 504 256 504 8 393 8 256 119 8 256 8zm113.9 231L234.4 103.5c-9.4-9.4-24.6-9.4-33.9 0l-17 17c-9.4 9.4-9.4 24.6 0 33.9L285.1 256 183.5 357.6c-9.4 9.4-9.4 24.6 0 33.9l17 17c9.4 9.4 24.6 9.4 33.9 0L369.9 273c9.4-9.4 9.4-24.6 0-34z"></path></svg>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-a860086 elementor-widget elementor-widget-jkit_post_title" data-id="a860086" data-element_type="widget" data-widget_type="jkit_post_title.default">
                    <div class="jeg-elementor-kit jkit-post-title">
                        <div class="post-title style-color">{{ $label }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ===== MAIN CONTENT + SIDEBAR ===== --}}
<div class="elementor-element elementor-element-41b7c7e e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="41b7c7e" data-element_type="container">
    <div class="e-con-inner">

        {{-- Main Column --}}
        <div class="elementor-element elementor-element-4a8a549 e-con-full e-flex e-con e-child" data-id="4a8a549" data-element_type="container">

            @forelse($paths as $path)

            {{-- Program Title --}}
            <div class="elementor-element elementor-element-a74427c elementor-widget elementor-widget-heading" data-id="a74427c" data-element_type="widget" data-widget_type="heading.default">
                <h2 class="elementor-heading-title elementor-size-default">{{ $path->title_ar }}</h2>
            </div>

            {{-- Program Description --}}
            @if($path->description_ar)
            <div class="elementor-element elementor-element-7cdaaf1 elementor-widget elementor-widget-text-editor" data-id="7cdaaf1" data-element_type="widget" data-widget_type="text-editor.default">
                <p>{{ $path->description_ar }}</p>
            </div>
            @endif

            {{-- Image + Objectives --}}
            <div class="elementor-element elementor-element-ec32878 e-con-full e-flex e-con e-child" data-id="ec32878" data-element_type="container">
                <div class="elementor-element elementor-element-46cc19d elementor-widget elementor-widget-image" data-id="46cc19d" data-element_type="widget" data-widget_type="image.default">
                    @if($path->logo)
                        <img src="{{ Storage::url($path->logo) }}" alt="{{ $path->title_ar }}">
                    @else
                        <img src="{{ asset('images/girl-on-the-couch-at-the-beautician-2026-03-18-11-10-15-utc2.webp') }}" alt="{{ $path->title_ar }}">
                    @endif
                </div>
                <div class="elementor-element elementor-element-a396bc1 e-con-full e-flex e-con e-child" data-id="a396bc1" data-element_type="container">
                    @if($path->level || $path->duration)
                    <div class="elementor-element elementor-element-a2287c6 elementor-widget elementor-widget-heading" data-id="a2287c6" data-element_type="widget" data-widget_type="heading.default">
                        <h3 class="elementor-heading-title elementor-size-default">
                            @if($path->level){{ $path->level }}@endif
                            @if($path->level && $path->duration) — @endif
                            @if($path->duration){{ $path->duration }}@endif
                        </h3>
                    </div>
                    @endif
                    @if($path->objectives && count($path->objectives))
                    <div class="elementor-element elementor-element-afddeaa elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="afddeaa" data-element_type="widget" data-widget_type="icon-list.default">
                        <ul class="elementor-icon-list-items">
                            @foreach(array_slice($path->objectives, 0, 5) as $obj)
                            <li class="elementor-icon-list-item">
                                <span class="elementor-icon-list-icon">
                                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-circle" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg>
                                </span>
                                <span class="elementor-icon-list-text">{{ $obj }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Requirements as Steps --}}
            @if($path->requirements && count($path->requirements))
            <div class="elementor-element elementor-element-a8e133e elementor-widget elementor-widget-heading" data-id="a8e133e" data-element_type="widget" data-widget_type="heading.default">
                <h3 class="elementor-heading-title elementor-size-default">متطلبات القبول</h3>
            </div>
            <div class="elementor-element elementor-element-ef3106a e-con-full e-flex e-con e-child" data-id="ef3106a" data-element_type="container">
                @foreach(array_slice($path->requirements, 0, 4) as $i => $req)
                <div class="elementor-element elementor-element-9361fac elementor-widget elementor-widget-elementskit-heading" data-id="9361fac" data-element_type="widget" data-widget_type="elementskit-heading.default">
                    <div class="ekit-wid-con">
                        <div class="ekit-heading elementskit-section-title-wraper text_left">
                            <h2 class="ekit-heading--title elementskit-section-title">{{ $i + 1 }}. {{ $req }}</h2>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            @empty
            <div class="elementor-element elementor-element-a74427c elementor-widget elementor-widget-heading" data-id="a74427c" data-element_type="widget" data-widget_type="heading.default">
                <h2 class="elementor-heading-title elementor-size-default">لا توجد برامج في هذا المسار حتى الآن</h2>
            </div>
            <div class="elementor-element elementor-element-7cdaaf1 elementor-widget elementor-widget-text-editor" data-id="7cdaaf1" data-element_type="widget" data-widget_type="text-editor.default">
                <p>يتم العمل على إضافة برامج جديدة قريباً. تابعونا للاطلاع على آخر المستجدات.</p>
            </div>
            @endforelse

        </div>

        {{-- Sidebar --}}
        <div class="elementor-element elementor-element-47bdc99 e-con-full e-flex e-con e-child" data-id="47bdc99" data-element_type="container">

            {{-- Other Categories --}}
            <div class="elementor-element elementor-element-6aeb081 e-con-full e-flex e-con e-child" data-id="6aeb081" data-element_type="container">
                <div class="elementor-element elementor-element-4c74bee elementor-widget elementor-widget-heading" data-id="4c74bee" data-element_type="widget" data-widget_type="heading.default">
                    <h4 class="elementor-heading-title elementor-size-default">المسارات التعليمية</h4>
                </div>
                <div class="elementor-element elementor-element-5d608fa elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="5d608fa" data-element_type="widget" data-widget_type="icon-list.default">
                    <ul class="elementor-icon-list-items">
                        <li class="elementor-icon-list-item{{ $category === 'taheel' ? ' active' : '' }}">
                            <a href="{{ route('education.category', 'taheel') }}">
                                <span class="elementor-icon-list-icon">
                                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-dot-circle" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm80 248c0 44.112-35.888 80-80 80s-80-35.888-80-80 35.888-80 80-80 80 35.888 80 80z"></path></svg>
                                </span>
                                <span class="elementor-icon-list-text">مسار التأهيل</span>
                            </a>
                        </li>
                        <li class="elementor-icon-list-item{{ $category === 'tatweer' ? ' active' : '' }}">
                            <a href="{{ route('education.category', 'tatweer') }}">
                                <span class="elementor-icon-list-icon">
                                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-dot-circle" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm80 248c0 44.112-35.888 80-80 80s-80-35.888-80-80 35.888-80 80-80 80 35.888 80 80z"></path></svg>
                                </span>
                                <span class="elementor-icon-list-text">مسار التطوير</span>
                            </a>
                        </li>
                        <li class="elementor-icon-list-item{{ $category === 'certificates' ? ' active' : '' }}">
                            <a href="{{ route('education.category', 'certificates') }}">
                                <span class="elementor-icon-list-icon">
                                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-dot-circle" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm80 248c0 44.112-35.888 80-80 80s-80-35.888-80-80 35.888-80 80-80 80 35.888 80 80z"></path></svg>
                                </span>
                                <span class="elementor-icon-list-text">فئة الشهادات</span>
                            </a>
                        </li>
                        <li class="elementor-icon-list-item">
                            <a href="{{ route('awards') }}">
                                <span class="elementor-icon-list-icon">
                                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-dot-circle" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm80 248c0 44.112-35.888 80-80 80s-80-35.888-80-80 35.888-80 80-80 80 35.888 80 80z"></path></svg>
                                </span>
                                <span class="elementor-icon-list-text">الجوائز والأوسمة</span>
                            </a>
                        </li>
                        <li class="elementor-icon-list-item">
                            <a href="{{ route('events') }}">
                                <span class="elementor-icon-list-icon">
                                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-dot-circle" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm80 248c0 44.112-35.888 80-80 80s-80-35.888-80-80 35.888-80 80-80 80 35.888 80 80z"></path></svg>
                                </span>
                                <span class="elementor-icon-list-text">الفعاليات الدولية</span>
                            </a>
                        </li>
                        <li class="elementor-icon-list-item">
                            <a href="{{ route('profession-day') }}">
                                <span class="elementor-icon-list-icon">
                                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-dot-circle" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm80 248c0 44.112-35.888 80-80 80s-80-35.888-80-80 35.888-80 80-80 80 35.888 80 80z"></path></svg>
                                </span>
                                <span class="elementor-icon-list-text">يوم المهنة العالمي</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- WhatsApp CTA --}}
            <div class="elementor-element elementor-element-3ca52b0 e-con-full e-flex e-con e-child" data-id="3ca52b0" data-element_type="container">
                <div class="elementor-element elementor-element-5ea5536 elementor-widget elementor-widget-heading" data-id="5ea5536" data-element_type="widget" data-widget_type="heading.default">
                    <h4 class="elementor-heading-title elementor-size-default">استفسر عن البرامج، الآن!</h4>
                </div>
                <div class="elementor-element elementor-element-0a9dac7 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="0a9dac7" data-element_type="widget" data-widget_type="divider.default">
                    <div class="elementor-divider"><span class="elementor-divider-separator"></span></div>
                </div>
                <div class="elementor-element elementor-element-ec45b66 elementor-widget elementor-widget-text-editor" data-id="ec45b66" data-element_type="widget" data-widget_type="text-editor.default">
                    <p>فريقنا جاهز للإجابة على استفساراتك ومساعدتك في اختيار المسار المناسب.</p>
                </div>
                <div class="elementor-element elementor-element-f951a6e elementor-position-inline-start elementor-view-stacked elementor-shape-circle elementor-widget elementor-widget-icon-box" data-id="f951a6e" data-element_type="widget" data-widget_type="icon-box.default">
                    <a href="https://wa.me/971501592592" target="_blank" style="text-decoration:none;">
                        <div class="elementor-icon-box-wrapper">
                            <div class="elementor-icon-box-icon">
                                <span class="elementor-icon">
                                    <svg class="ekit-svg-icon icon-whatsapp-2" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M7.739 29.717c2.472 1.488 5.299 2.272 8.204 2.272 8.802 0 16.057-7.182 16.057-15.994 0-8.802-7.245-15.994-16.057-15.994-8.785 0-15.932 7.175-15.932 15.994 0 2.943 0.784 5.792 2.272 8.266l-2.283 7.74zM1.886 15.994c0-7.786 6.306-14.12 14.057-14.12 7.82 0 14.182 6.334 14.182 14.12s-6.362 14.12-14.182 14.12c-2.691 0-5.306-0.762-7.562-2.205l-0.36-0.23-5.249 1.549 1.549-5.25-0.23-0.36c-1.442-2.256-2.205-4.892-2.205-7.624z"></path><path d="M7.789 13.047c0.31 1.626 1.229 4.753 3.904 7.428s5.802 3.595 7.428 3.904c1.862 0.355 4.594 0.408 5.929-0.927l0.744-0.744c0.376-0.376 0.583-0.875 0.583-1.407s-0.207-1.031-0.583-1.407l-2.977-2.977c-0.376-0.376-0.875-0.583-1.407-0.583s-1.031 0.207-1.407 0.583l-0.744 0.744c-0.455 0.455-1.313 0.457-1.771 0.006l-2.969-3.094c-0.004-0.005-0.009-0.009-0.013-0.014-0.455-0.455-0.455-1.196 0-1.652l0.744-0.744c0.778-0.778 0.778-2.036 0-2.814l-2.977-2.977c-0.776-0.776-2.038-0.776-2.814 0l-0.744 0.744c-1.066 1.066-1.421 3.338-0.927 5.93z"></path></svg>
                                </span>
                            </div>
                            <div class="elementor-icon-box-content">
                                <div class="elementor-icon-box-title"><span>+971 50 1 592 592</span></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- ===== CTA BANNER ===== --}}
<div class="elementor-element elementor-element-3789d7c e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="3789d7c" data-element_type="container">
    <div class="e-con-inner">
        <div class="elementor-element elementor-element-88e3fb2 e-con-full e-flex e-con e-child" data-id="88e3fb2" data-element_type="container">
            <div class="elementor-element elementor-element-6fe855c elementor-widget__width-initial elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="6fe855c" data-element_type="widget" data-widget_type="divider.default">
                <div class="elementor-divider"><span class="elementor-divider-separator"></span></div>
            </div>
            <div class="elementor-element elementor-element-7b25431 elementor-widget elementor-widget-heading" data-id="7b25431" data-element_type="widget" data-widget_type="heading.default">
                <h2 class="elementor-heading-title elementor-size-default">احترافيتك تبدأ من التعليم الصحيح</h2>
            </div>
            <div class="elementor-element elementor-element-c4881c9 elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="c4881c9" data-element_type="widget" data-widget_type="text-editor.default">
                <p>انضم لآلاف المختصين الذين اختاروا الاتحاد العالمي الأكاديمي للتزيين طريقاً نحو الاحترافية والاعتراف الدولي.</p>
            </div>
            <div class="elementor-element elementor-element-aa32724 elementor-align-center elementor-widget elementor-widget-button" data-id="aa32724" data-element_type="widget" data-widget_type="button.default">
                <a class="elementor-button elementor-button-link elementor-size-sm" href="{{ route('join') }}">
                    <span class="elementor-button-content-wrapper">
                        <span class="elementor-button-text">انضم إلينا الآن</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>

{{-- ===== FAQ / CONTACT SECTION ===== --}}
<div class="elementor-element elementor-element-609e03b e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="609e03b" data-element_type="container">
    <div class="e-con-inner">
        <div class="elementor-element elementor-element-0c33765 e-con-full e-flex e-con e-child" data-id="0c33765" data-element_type="container">
            <div class="elementor-element elementor-element-8015962 elementor-widget elementor-widget-image" data-id="8015962" data-element_type="widget" data-widget_type="image.default">
                <img src="{{ asset('images/smiling-attractive-man-and-senior-smiling-cosmetol-2026-03-19-07-57-58-utc2.webp') }}" alt="CMAC Education">
            </div>
            <div class="elementor-element elementor-element-22a3cea elementor-widget__width-initial elementor-absolute elementor-widget elementor-widget-elementskit-heading" data-id="22a3cea" data-element_type="widget" data-widget_type="elementskit-heading.default">
                <div class="ekit-wid-con">
                    <div class="ekit-heading elementskit-section-title-wraper text_left">
                        <h4 class="ekit-heading--title elementskit-section-title">هل لديك استفسار؟</h4>
                        <div class="ekit-heading__description"><p>تواصل معنا وسيساعدك فريقنا في اختيار المسار المناسب.</p></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-7317de5 e-con-full e-flex e-con e-child" data-id="7317de5" data-element_type="container">
            <div class="elementor-element elementor-element-9061928 elementor-widget elementor-widget-heading" data-id="9061928" data-element_type="widget" data-widget_type="heading.default">
                <h2 class="elementor-heading-title elementor-size-default">لماذا تختارنا؟</h2>
            </div>
            <div class="elementor-element elementor-element-971e171 elementor-widget elementor-widget-heading" data-id="971e171" data-element_type="widget" data-widget_type="heading.default">
                <h3 class="elementor-heading-title elementor-size-default">الأسئلة الشائعة حول البرامج</h3>
            </div>
            <div class="elementor-element elementor-element-92e0990 elementor-widget elementor-widget-text-editor" data-id="92e0990" data-element_type="widget" data-widget_type="text-editor.default">
                <p>إليك إجابات على أبرز الأسئلة التي يطرحها الملتحقون ببرامجنا التعليمية.</p>
            </div>
            <div class="elementor-element elementor-element-286f345 elementor-widget elementor-widget-elementskit-accordion" data-id="286f345" data-element_type="widget" data-widget_type="elementskit-accordion.default">
                <div class="ekit-wid-con">
                    <div class="elementskit-accordion accoedion-primary" id="accordion-edu-faq">
                        <div class="elementskit-card active">
                            <div class="elementskit-card-header" id="faqHeading-0">
                                <a href="#" class="ekit-accordion--toggler elementskit-btn-link collapsed" data-ekit-toggle="collapse" data-target="#faqCollapse-0" aria-expanded="true">
                                    <div class="ekit_accordion_icon_left_group">
                                        <div class="ekit_accordion_normal_icon"><i class="jki jki-chevrons-right-line"></i></div>
                                        <div class="ekit_accordion_active_icon"><i class="jki jki-chevrons-down-line"></i></div>
                                    </div>
                                    <span class="ekit-accordion-title">هل الشهادات معتمدة دولياً؟</span>
                                </a>
                            </div>
                            <div id="faqCollapse-0" class="show collapse" aria-labelledby="faqHeading-0" data-parent="#accordion-edu-faq">
                                <div class="elementskit-card-body ekit-accordion--content">
                                    <p>نعم، جميع شهادات الاتحاد العالمي الأكاديمي للتزيين معتمدة دولياً ومعترف بها في أكثر من 50 دولة حول العالم.</p>
                                </div>
                            </div>
                        </div>
                        <div class="elementskit-card">
                            <div class="elementskit-card-header" id="faqHeading-1">
                                <a href="#" class="ekit-accordion--toggler elementskit-btn-link collapsed" data-ekit-toggle="collapse" data-target="#faqCollapse-1" aria-expanded="false">
                                    <div class="ekit_accordion_icon_left_group">
                                        <div class="ekit_accordion_normal_icon"><i class="jki jki-chevrons-right-line"></i></div>
                                        <div class="ekit_accordion_active_icon"><i class="jki jki-chevrons-down-line"></i></div>
                                    </div>
                                    <span class="ekit-accordion-title">كيف يمكنني التسجيل في برنامج؟</span>
                                </a>
                            </div>
                            <div id="faqCollapse-1" class="collapse" aria-labelledby="faqHeading-1" data-parent="#accordion-edu-faq">
                                <div class="elementskit-card-body ekit-accordion--content">
                                    <p>يمكنك التسجيل عبر نموذج الانضمام في موقعنا، أو التواصل معنا مباشرة عبر واتساب وسيتولى فريقنا توجيهك خلال إجراءات القبول.</p>
                                </div>
                            </div>
                        </div>
                        <div class="elementskit-card">
                            <div class="elementskit-card-header" id="faqHeading-2">
                                <a href="#" class="ekit-accordion--toggler elementskit-btn-link collapsed" data-ekit-toggle="collapse" data-target="#faqCollapse-2" aria-expanded="false">
                                    <div class="ekit_accordion_icon_left_group">
                                        <div class="ekit_accordion_normal_icon"><i class="jki jki-chevrons-right-line"></i></div>
                                        <div class="ekit_accordion_active_icon"><i class="jki jki-chevrons-down-line"></i></div>
                                    </div>
                                    <span class="ekit-accordion-title">ما الفرق بين مسار التأهيل ومسار التطوير؟</span>
                                </a>
                            </div>
                            <div id="faqCollapse-2" class="collapse" aria-labelledby="faqHeading-2" data-parent="#accordion-edu-faq">
                                <div class="elementskit-card-body ekit-accordion--content">
                                    <p>مسار التأهيل مُصمَّم للمبتدئين الراغبين في دخول المجال، بينما يستهدف مسار التطوير المختصين العاملين الذين يسعون إلى رفع مستواهم المهني.</p>
                                </div>
                            </div>
                        </div>
                        <div class="elementskit-card">
                            <div class="elementskit-card-header" id="faqHeading-3">
                                <a href="#" class="ekit-accordion--toggler elementskit-btn-link collapsed" data-ekit-toggle="collapse" data-target="#faqCollapse-3" aria-expanded="false">
                                    <div class="ekit_accordion_icon_left_group">
                                        <div class="ekit_accordion_normal_icon"><i class="jki jki-chevrons-right-line"></i></div>
                                        <div class="ekit_accordion_active_icon"><i class="jki jki-chevrons-down-line"></i></div>
                                    </div>
                                    <span class="ekit-accordion-title">هل تُقدَّم البرامج عبر الإنترنت أم حضورياً؟</span>
                                </a>
                            </div>
                            <div id="faqCollapse-3" class="collapse" aria-labelledby="faqHeading-3" data-parent="#accordion-edu-faq">
                                <div class="elementskit-card-body ekit-accordion--content">
                                    <p>تُقدَّم برامجنا بكلا الأسلوبين: حضورياً في المراكز المعتمدة وعن بُعد عبر منصتنا التعليمية الإلكترونية، وذلك بحسب البرنامج والدولة.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>{{-- end .elementor-2087 --}}

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/post-2087.css') }}">
@endpush

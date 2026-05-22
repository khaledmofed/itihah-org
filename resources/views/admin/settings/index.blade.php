@extends('layouts.admin')

@section('title', 'إعدادات الموقع')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-gear me-2" style="color:var(--primary);"></i> إعدادات الموقع</h1>
</div>

<div class="admin-card card">
    <div class="card-body">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if($errors->any())
            <div class="alert alert-danger rounded-3 mb-4">
                <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
            @endif

            {{-- General --}}
            <h5 class="fw-bold mb-4 pb-3 border-bottom" style="color:var(--primary);">
                <i class="bi bi-globe me-2"></i> الإعدادات العامة
            </h5>
            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <label class="form-label">اسم الموقع (عربي)</label>
                    <input type="text" name="settings[site_name_ar]" class="form-control"
                        value="{{ old('settings.site_name_ar', $settings['site_name_ar'] ?? 'الاتحاد العالمي الأكاديمي للتزيين') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">اسم الموقع (إنجليزي)</label>
                    <input type="text" name="settings[site_name_en]" class="form-control" dir="ltr"
                        value="{{ old('settings.site_name_en', $settings['site_name_en'] ?? 'World Union Academy of Cosmetology') }}">
                </div>
                <div class="col-12">
                    <label class="form-label">وصف الموقع (عربي)</label>
                    <textarea name="settings[site_description_ar]" rows="2" class="form-control">{{ old('settings.site_description_ar', $settings['site_description_ar'] ?? '') }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">اللوغو</label>
                    @if(!empty($settings['logo']))
                    <div class="mb-2"><img src="{{ Storage::url($settings['logo']) }}" class="img-preview d-block"></div>
                    @endif
                    <input type="file" name="logo" class="form-control" accept="image/*">
                </div>
                <div class="col-md-6">
                    <label class="form-label">لوغو الفوتر <small class="text-muted">(إذا تركته فارغاً سيُستخدم اللوغو الرئيسي)</small></label>
                    @if(!empty($settings['footer_logo']))
                    <div class="mb-2"><img src="{{ Storage::url($settings['footer_logo']) }}" class="img-preview d-block"></div>
                    @endif
                    <input type="file" name="footer_logo" class="form-control" accept="image/*">
                </div>
                <div class="col-md-6">
                    <label class="form-label">الفافيكون</label>
                    @if(!empty($settings['favicon']))
                    <div class="mb-2"><img src="{{ Storage::url($settings['favicon']) }}" style="max-height:32px;" class="d-block"></div>
                    @endif
                    <input type="file" name="favicon" class="form-control" accept="image/*">
                </div>
            </div>

            {{-- Contact --}}
            <h5 class="fw-bold mb-4 pb-3 border-bottom" style="color:var(--primary);">
                <i class="bi bi-telephone me-2"></i> معلومات التواصل
            </h5>
            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <label class="form-label">البريد الإلكتروني</label>
                    <input type="email" name="settings[contact_email]" class="form-control" dir="ltr"
                        value="{{ old('settings.contact_email', $settings['contact_email'] ?? 'manalcmac@hotmail.com') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">رقم الهاتف</label>
                    <input type="text" name="settings[contact_phone]" class="form-control" dir="ltr"
                        value="{{ old('settings.contact_phone', $settings['contact_phone'] ?? '+971 50 1 592 592') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">العنوان</label>
                    <input type="text" name="settings[address]" class="form-control"
                        value="{{ old('settings.address', $settings['address'] ?? 'دبي، الإمارات العربية المتحدة') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">الموقع الإلكتروني</label>
                    <input type="text" name="settings[website]" class="form-control" dir="ltr"
                        value="{{ old('settings.website', $settings['website'] ?? 'www.cmacint.com') }}">
                </div>
            </div>

            {{-- Social --}}
            <h5 class="fw-bold mb-4 pb-3 border-bottom" style="color:var(--primary);">
                <i class="bi bi-share me-2"></i> وسائل التواصل الاجتماعي
            </h5>
            <div class="row g-4 mb-5">
                @foreach(['facebook' => 'Facebook', 'instagram' => 'Instagram', 'twitter' => 'Twitter/X', 'youtube' => 'YouTube', 'whatsapp' => 'WhatsApp'] as $key => $label)
                <div class="col-md-6">
                    <label class="form-label">{{ $label }}</label>
                    <input type="url" name="settings[social_{{ $key }}]" class="form-control" dir="ltr"
                        value="{{ old('settings.social_' . $key, $settings['social_' . $key] ?? '') }}"
                        placeholder="https://...">
                </div>
                @endforeach
            </div>

            {{-- Hero Section --}}
            <h5 class="fw-bold mb-4 pb-3 border-bottom" style="color:var(--primary);">
                <i class="bi bi-play-circle me-2"></i> قسم الهيرو (مقاطع الفيديو والبطاقات)
            </h5>
            <div class="alert alert-info rounded-3 mb-4" style="font-size:13px;">
                <i class="bi bi-info-circle me-1"></i>
                مقاطع الفيديو تُضاف من قسم <a href="{{ route('admin.sliders.index') }}" class="fw-bold">مقاطع الفيديو الرئيسية</a> — أضف رابط الفيديو في حقل "رابط الفيديو" لكل سلايد.
            </div>
            <div class="row g-4 mb-5">
                {{-- Main text + badge image --}}
                <div class="col-12">
                    <label class="form-label">العنوان الرئيسي (H1)</label>
                    <input type="text" name="settings[hero_heading]" class="form-control"
                        value="{{ old('settings.hero_heading', $settings['hero_heading'] ?? 'ارتقِ بمهنتك إلى المستوى العالمي') }}">
                </div>
                <div class="col-12">
                    <label class="form-label">النص التعريفي</label>
                    <textarea name="settings[hero_subtext]" rows="2" class="form-control">{{ old('settings.hero_subtext', $settings['hero_subtext'] ?? 'منظمة دولية متخصصة في تعليم وتطوير مهنة التزيين والتجميل، تأسست قبل 25 عاماً وتضم خبراء من أكثر من 50 دولة حول العالم.') }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">نص زر الانضمام</label>
                    <input type="text" name="settings[hero_btn_text]" class="form-control"
                        value="{{ old('settings.hero_btn_text', $settings['hero_btn_text'] ?? 'انضم إلينا الآن') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">صورة الشارة (w.png — اليمين العلوي من الهيرو)</label>
                    @if(!empty($settings['hero_badge_image']))
                    <div class="mb-2"><img src="{{ Storage::url($settings['hero_badge_image']) }}" class="img-preview d-block"></div>
                    @endif
                    <input type="file" name="hero_badge_image" class="form-control" accept="image/*">
                </div>
                {{-- Stats row --}}
                <div class="col-md-4">
                    <label class="form-label">عداد الخريجين (الرقم)</label>
                    <input type="text" name="settings[hero_graduates_count]" class="form-control"
                        value="{{ old('settings.hero_graduates_count', $settings['hero_graduates_count'] ?? '+5000') }}" placeholder="+5000">
                </div>
                <div class="col-md-4">
                    <label class="form-label">نص الخريجين</label>
                    <input type="text" name="settings[hero_graduates_text]" class="form-control"
                        value="{{ old('settings.hero_graduates_text', $settings['hero_graduates_text'] ?? 'خريج من حول العالم') }}">
                </div>
                {{-- Avatars --}}
                <div class="col-12">
                    <label class="form-label">صور الأفاتار (3 صور دائرية في صف الإحصائيات)</label>
                </div>
                @foreach([1,2,3] as $n)
                <div class="col-md-4">
                    <label class="form-label">الصورة {{ $n }}</label>
                    @if(!empty($settings['hero_avatar_' . $n]))
                    <div class="mb-2">
                        <img src="{{ Storage::url($settings['hero_avatar_' . $n]) }}" style="width:52px;height:52px;object-fit:cover;border-radius:50%;" class="d-block">
                    </div>
                    @endif
                    <input type="file" name="hero_avatar_{{ $n }}" class="form-control" accept="image/*">
                </div>
                @endforeach
                {{-- Feature cards --}}
                <div class="col-12 mt-3"><label class="form-label fw-bold">البطاقات الثلاث (يمين الهيرو)</label></div>
                @php
                $cardTitles = ['معايير دولية', 'خبراء معتمدون', 'انضم إلى الاتحاد اليوم!'];
                $cardDescs  = [
                    'برامج تدريبية معتمدة دولياً تطبّق أعلى معايير الجودة والتميز في مجال التزيين والتجميل منذ 25 عاماً.',
                    'شبكة من أبرز الخبراء والمتخصصين في التزيين من أكثر من 50 دولة حول العالم.',
                    'كن جزءاً من مجتمع عالمي يضم أكثر من 5000 خريج محترف، وارتقِ بمسيرتك إلى الاحتراف الدولي.',
                ];
                @endphp
                @foreach([1,2,3] as $n)
                <div class="col-md-6">
                    <label class="form-label">عنوان البطاقة {{ $n }}</label>
                    <input type="text" name="settings[hero_card{{ $n }}_title]" class="form-control"
                        value="{{ old('settings.hero_card'.$n.'_title', $settings['hero_card'.$n.'_title'] ?? $cardTitles[$n-1]) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">وصف البطاقة {{ $n }}</label>
                    <input type="text" name="settings[hero_card{{ $n }}_desc]" class="form-control"
                        value="{{ old('settings.hero_card'.$n.'_desc', $settings['hero_card'.$n.'_desc'] ?? $cardDescs[$n-1]) }}">
                </div>
                @endforeach
                <div class="col-md-6">
                    <label class="form-label">نص زر واتساب</label>
                    <input type="text" name="settings[hero_whatsapp_text]" class="form-control"
                        value="{{ old('settings.hero_whatsapp_text', $settings['hero_whatsapp_text'] ?? 'تواصل عبر واتساب') }}">
                    <small class="text-muted">رابط واتساب يُحدَّد في قسم وسائل التواصل الاجتماعي أعلاه</small>
                </div>
            </div>

            {{-- Appointment Section --}}
            <h5 class="fw-bold mb-4 pb-3 border-bottom" style="color:var(--primary);">
                <i class="bi bi-calendar-check me-2"></i> قسم المواعيد (الصفحة الرئيسية)
            </h5>
            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <label class="form-label">عنوان قسم المواعيد</label>
                    <input type="text" name="settings[appointment_title_ar]" class="form-control"
                        value="{{ old('settings.appointment_title_ar', $settings['appointment_title_ar'] ?? 'احجز موعدك معنا') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">العنوان الفرعي</label>
                    <input type="text" name="settings[appointment_subtitle_ar]" class="form-control"
                        value="{{ old('settings.appointment_subtitle_ar', $settings['appointment_subtitle_ar'] ?? 'نحن هنا لمساعدتك') }}">
                </div>
                <div class="col-12">
                    <label class="form-label">وصف قسم المواعيد</label>
                    <textarea name="settings[appointment_desc_ar]" rows="2" class="form-control">{{ old('settings.appointment_desc_ar', $settings['appointment_desc_ar'] ?? 'تواصل مع فريقنا وسنكون سعداء بمساعدتك في رحلتك المهنية.') }}</textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label">ساعات عمل الأسبوع (الإثنين-الجمعة)</label>
                    <input type="text" name="settings[hours_weekdays]" class="form-control"
                        value="{{ old('settings.hours_weekdays', $settings['hours_weekdays'] ?? '9:00 ص — 6:00 م') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">ساعات عمل السبت</label>
                    <input type="text" name="settings[hours_saturday]" class="form-control"
                        value="{{ old('settings.hours_saturday', $settings['hours_saturday'] ?? '10:00 ص — 4:00 م') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">الأحد</label>
                    <input type="text" name="settings[hours_sunday]" class="form-control"
                        value="{{ old('settings.hours_sunday', $settings['hours_sunday'] ?? 'مغلق') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">نص زر الحجز</label>
                    <input type="text" name="settings[appointment_btn_text]" class="form-control"
                        value="{{ old('settings.appointment_btn_text', $settings['appointment_btn_text'] ?? 'احجز موعدك') }}">
                </div>
            </div>

            {{-- SEO --}}
            <h5 class="fw-bold mb-4 pb-3 border-bottom" style="color:var(--primary);">
                <i class="bi bi-search me-2"></i> تحسين محركات البحث (SEO)
            </h5>
            <div class="row g-4 mb-5">
                <div class="col-12">
                    <label class="form-label">الكلمات المفتاحية</label>
                    <input type="text" name="settings[meta_keywords]" class="form-control"
                        value="{{ old('settings.meta_keywords', $settings['meta_keywords'] ?? 'تزيين، تجميل، أكاديمية، دبي، CMAC') }}">
                </div>
                <div class="col-12">
                    <label class="form-label">الوصف (Meta Description)</label>
                    <textarea name="settings[meta_description]" rows="2" class="form-control">{{ old('settings.meta_description', $settings['meta_description'] ?? '') }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary px-5 rounded-3 btn-lg">
                <i class="bi bi-check-lg me-2"></i> حفظ الإعدادات
            </button>
        </form>
    </div>
</div>

@endsection

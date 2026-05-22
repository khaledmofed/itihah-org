@extends('layouts.app')

@section('title', 'الداعمون والشركاء')

@php
use App\Models\PageSection;
$ps = fn(string $section, string $key, string $default = '') =>
    PageSection::getValue('supporter', $section, $key, $default);
@endphp

@section('content')

<div class="elementor elementor-1671" dir="rtl">

@include('partials.hero', [
    'heroTitle'      => $ps('hero','title','الداعمون والشركاء'),
    'heroDesc'       => $ps('hero','description','شراكات استراتيجية فاعلة مع جهات ومؤسسات وشركات تسهم في دعم وتطوير المجتمع المهني على المستوى الدولي.'),
    'heroBreadcrumb' => 'داعم',
])

{{-- ===== Intro Section ===== --}}
<section class="sp-section sp-intro">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="section-badge mb-3">{{ $ps('intro','badge','شراكة استراتيجية') }}</div>
                <h2 class="sp-section-title">{{ $ps('intro','title','داعمو الاتحاد العالمي الأكاديمي للتزيين') }}</h2>
                <p class="sp-body-text mt-4">{{ $ps('intro','description','يحظى الاتحاد العالمي الأكاديمي للتزيين بشراكات استراتيجية فاعلة مع جهات ومؤسسات وشركات داعمة تسهم بدور محوري في دعم وتطوير المجتمع المهني، وتعزيز جودة المبادرات والبرامج على المستوى الدولي.') }}</p>
            </div>
            <div class="col-lg-6">
                <div class="sp-vision-card">
                    <div class="sp-vision-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4 class="sp-vision-title">{{ $ps('vision','title','رؤيتنا في الشراكات') }}</h4>
                    <p class="sp-vision-text">{{ $ps('vision','description','نؤمن بأن التكامل بين المؤسسات المهنية والجهات الداعمة يسهم في خلق بيئة متكاملة قائمة على التطوير، والابتكار، والاستدامة.') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== Partner Categories ===== --}}
<section class="sp-section" style="background:var(--bg-light);">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-label">شركاء النجاح</span>
            <h2 class="section-title mt-2">{{ $ps('proud','title','نفخر بشراكاتنا') }}</h2>
            <div class="section-divider"></div>
            <p class="section-desc mt-3">{{ $ps('proud','description','نفخر بشراكاتنا مع جهات داعمة ومؤسسات رائدة تسهم في تطوير المجتمع المهني عالميًا، وتعزز من حضور الاتحاد ودوره في دعم الكوادر المهنية والارتقاء بالمهنة.') }}</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="sp-cat-card">
                    <div class="sp-cat-icon"><i class="fas fa-graduation-cap"></i></div>
                    <h6 class="sp-cat-title">الجهات التعليمية</h6>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="sp-cat-card">
                    <div class="sp-cat-icon"><i class="fas fa-landmark"></i></div>
                    <h6 class="sp-cat-title">الجهات الحكومية</h6>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="sp-cat-card">
                    <div class="sp-cat-icon"><i class="fas fa-globe"></i></div>
                    <h6 class="sp-cat-title">الجهات غير الحكومية</h6>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="sp-cat-card">
                    <div class="sp-cat-icon"><i class="fas fa-building"></i></div>
                    <h6 class="sp-cat-title">الشركات الراعية والداعمة</h6>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="sp-cat-card">
                    <div class="sp-cat-icon"><i class="fas fa-calendar-check"></i></div>
                    <h6 class="sp-cat-title">شركاء الفعاليات</h6>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="sp-cat-card">
                    <div class="sp-cat-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    <h6 class="sp-cat-title">مراكز التدريب</h6>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== Supporters Grid from DB ===== --}}
@if($supporters->count())
<section class="sp-section" style="background:#f8fbff;">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-badge mx-auto mb-3">شركاؤنا</div>
            <h2 class="sp-section-title">الجهات الداعمة</h2>
        </div>

        @php
        $grouped    = $supporters->groupBy('type');
        $typeLabels = [
            'official' => ['label' => 'داعمون رسميون',           'icon' => 'fas fa-star'],
            'sponsor'  => ['label' => 'رعاة',                    'icon' => 'fas fa-gem'],
            'partner'  => ['label' => 'شركاء',                   'icon' => 'fas fa-handshake'],
            ''         => ['label' => 'داعمون',                  'icon' => 'fas fa-heart'],
        ];
        @endphp

        @foreach($grouped as $type => $group)
        <div class="sp-group mb-5">
            <div class="sp-group-header">
                <i class="{{ ($typeLabels[$type] ?? $typeLabels[''])['icon'] }}"></i>
                <span>{{ ($typeLabels[$type] ?? $typeLabels[''])['label'] }}</span>
            </div>
            <div class="row g-4 mt-2">
                @foreach($group as $supporter)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="sp-supporter-card">
                        @if($supporter->logo)
                        <div class="sp-supporter-logo">
                            <img src="{{ Storage::url($supporter->logo) }}" alt="{{ $supporter->name_ar }}">
                        </div>
                        @else
                        <div class="sp-supporter-logo sp-supporter-logo--placeholder">
                            <i class="fas fa-building"></i>
                        </div>
                        @endif
                        <h6 class="sp-supporter-name">{{ $supporter->name_ar }}</h6>
                        @if($supporter->name_en)
                        <p class="sp-supporter-name-en">{{ $supporter->name_en }}</p>
                        @endif
                        @if($supporter->description_ar)
                        <p class="sp-supporter-desc">{{ Str::limit($supporter->description_ar, 80) }}</p>
                        @endif
                        @if($supporter->url)
                        <a href="{{ $supporter->url }}" target="_blank" rel="noopener" class="sp-supporter-link">
                            <i class="fas fa-external-link-alt"></i> زيارة الموقع
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif

{{-- ===== Become a Supporter CTA ===== --}}
<section class="sp-cta-section">
    <div class="container">
        <div class="sp-cta-inner">
            <div class="sp-cta-icon"><i class="fas fa-handshake"></i></div>
            <h2 class="sp-cta-title">{{ $ps('cta','title','كن داعمًا… وشاركنا في تطوير المجتمع المهني') }}</h2>
            <p class="sp-cta-text">{{ $ps('cta','description','تتيح الشراكة مع الاتحاد العالمي الأكاديمي للتزيين فرصة الوصول إلى شبكة واسعة من المتخصصين في مجال التزيين والتجميل في أكثر من 50 دولة حول العالم.') }}</p>
            <a href="{{ route('contact') }}" class="btn btn-white px-5 sp-cta-btn">
                <i class="fas fa-envelope" style="margin-left:8px;"></i> {{ $ps('cta','button_text','تواصل معنا للشراكة') }}
            </a>
        </div>
    </div>
</section>

</div>{{-- end .elementor-1671 --}}

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/post-1671.css') }}">
<style>
/* ===== Supporter Page Styles ===== */
.sp-section {
    padding: 80px 0;
}

.sp-section-title {
    font-family: 'Cormorant', 'Tajawal', serif;
    font-size: clamp(1.6rem, 3vw, 2.4rem);
    font-weight: 700;
    color: var(--text-dark);
    line-height: 1.3;
}

.sp-body-text {
    font-size: 16px;
    color: var(--text-muted);
    line-height: 1.95;
}

/* Vision Card */
.sp-vision-card {
    background: var(--primary);
    color: #fff;
    border-radius: 24px;
    padding: 40px 36px;
    position: relative;
    overflow: hidden;
}
.sp-vision-card::before {
    content: '';
    position: absolute;
    top: -40px; left: -40px;
    width: 180px; height: 180px;
    border-radius: 50%;
    background: rgba(255,255,255,0.07);
}
.sp-vision-icon {
    width: 58px; height: 58px;
    background: rgba(255,255,255,0.15);
    border-radius: 16px;
    display: flex; align-items: center; justify-content: center;
    font-size: 24px;
    margin-bottom: 20px;
}
.sp-vision-title {
    font-family: 'Cormorant', 'Tajawal', serif;
    font-size: 1.4rem;
    font-weight: 700;
    color: #fff !important;
    margin-bottom: 14px;
}
.sp-vision-text {
    font-size: 15px;
    color: rgba(255,255,255,0.88);
    line-height: 1.85;
    margin: 0;
}

/* Partner Category Cards */
.sp-cat-card {
    background: #fff;
    border-radius: 18px;
    padding: 28px 16px;
    text-align: center;
    box-shadow: 0 4px 24px rgba(33,102,169,0.07);
    border: 1px solid rgba(33,102,169,0.06);
    transition: transform 0.25s, box-shadow 0.25s;
    height: 100%;
}
.sp-cat-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 40px rgba(33,102,169,0.13);
}
.sp-cat-icon {
    width: 60px; height: 60px;
    background: var(--primary-lighter);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 22px;
    color: var(--primary);
    margin: 0 auto 16px;
}
.sp-cat-title {
    font-size: 13px;
    font-weight: 700;
    color: var(--text-dark);
    line-height: 1.4;
    margin: 0;
}

/* Group header */
.sp-group-header {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 16px;
    font-weight: 700;
    color: var(--primary);
    padding-bottom: 12px;
    border-bottom: 2px solid var(--primary-lighter);
}

/* Supporter Cards */
.sp-supporter-card {
    background: #fff;
    border-radius: 18px;
    padding: 28px 20px;
    text-align: center;
    box-shadow: 0 4px 24px rgba(33,102,169,0.07);
    border: 1px solid rgba(33,102,169,0.06);
    transition: transform 0.25s, box-shadow 0.25s;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.sp-supporter-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 14px 40px rgba(33,102,169,0.13);
}
.sp-supporter-logo {
    width: 100%; height: 90px;
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 16px;
}
.sp-supporter-logo img {
    max-height: 80px; max-width: 150px;
    object-fit: contain;
}
.sp-supporter-logo--placeholder {
    font-size: 3rem;
    color: var(--primary-light);
}
.sp-supporter-name {
    font-size: 15px;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 4px;
}
.sp-supporter-name-en {
    font-size: 12px;
    color: var(--text-muted);
    direction: ltr;
    margin-bottom: 6px;
}
.sp-supporter-desc {
    font-size: 13px;
    color: var(--text-muted);
    line-height: 1.7;
    flex: 1;
    margin-bottom: 14px;
}
.sp-supporter-link {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 13px;
    font-weight: 600;
    color: var(--primary);
    border: 1.5px solid var(--primary);
    border-radius: 20px;
    padding: 5px 16px;
    text-decoration: none;
    transition: background 0.2s, color 0.2s;
    margin-top: auto;
}
.sp-supporter-link:hover {
    background: var(--primary);
    color: #fff;
}

/* CTA Section */
.sp-cta-section {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    padding: 90px 0;
    position: relative;
    overflow: hidden;
}
.sp-cta-section::before {
    content: '';
    position: absolute;
    top: -80px; right: -80px;
    width: 300px; height: 300px;
    border-radius: 50%;
    background: rgba(255,255,255,0.05);
}
.sp-cta-section::after {
    content: '';
    position: absolute;
    bottom: -60px; left: -60px;
    width: 220px; height: 220px;
    border-radius: 50%;
    background: rgba(255,255,255,0.05);
}
.sp-cta-inner {
    text-align: center;
    position: relative;
    z-index: 1;
    max-width: 720px;
    margin: 0 auto;
}
.sp-cta-icon {
    width: 72px; height: 72px;
    background: rgba(255,255,255,0.15);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 28px;
    color: #fff;
    margin: 0 auto 24px;
}
.sp-cta-title {
    font-family: 'Cormorant', 'Tajawal', serif;
    font-size: clamp(1.4rem, 2.5vw, 2rem);
    font-weight: 700;
    color: #fff !important;
    margin-bottom: 16px;
}
.sp-cta-text {
    font-size: 15px;
    color: rgba(255,255,255,0.88);
    line-height: 1.9;
    margin-bottom: 32px;
}
.sp-cta-btn {
    font-weight: 700;
    font-size: 15px;
    color: var(--primary) !important;
    background: #fff !important;
    border-color: #fff !important;
    box-shadow: 0 6px 30px rgba(0,0,0,0.2);
    transition: transform 0.2s, box-shadow 0.2s;
}
.sp-cta-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 40px rgba(0,0,0,0.25);
    background: var(--bg-light) !important;
    border-color: var(--bg-light) !important;
}
</style>
@endpush

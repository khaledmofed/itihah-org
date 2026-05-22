@extends('layouts.app')

@section('title', 'يوم المهنة العالمي')

@section('content')

<div class="elementor elementor-1671" dir="rtl">

@include('partials.hero', [
    'heroTitle'      => 'يوم المهنة العالمي للتزيين والتجميل',
    'heroDesc'       => 'World Professional Day for Cosmetology & Beauty',
    'heroBreadcrumb' => 'يوم المهنة العالمي',
])

{{-- About: ما هو يوم المهنة؟ --}}
@if(isset($sections['about_day']) && $sections['about_day']->is_active)
<section class="section" style="background:var(--bg-light);">
    <div class="container">
        <div class="pd-intro">
            <div class="pd-intro-icon">
                <i class="fas fa-star"></i>
            </div>
            <h2 class="section-title">{{ $sections['about_day']->title_ar }}</h2>
            <div class="section-divider"></div>
            <p class="pd-intro-text">{!! nl2br(e($sections['about_day']->content_ar)) !!}</p>
        </div>

        {{-- 3 highlight cards --}}
        <div class="pd-cards">
            <div class="pd-card">
                <div class="pd-card-icon"><i class="fas fa-globe-asia"></i></div>
                <h4>احتفال دولي</h4>
                <p>يُقام في دول حول العالم في نفس اليوم</p>
            </div>
            <div class="pd-card">
                <div class="pd-card-icon"><i class="fas fa-certificate"></i></div>
                <h4>تكريم المحترفين</h4>
                <p>يوم مخصص لتكريم أصحاب مهنة التزيين</p>
            </div>
            <div class="pd-card">
                <div class="pd-card-icon"><i class="fas fa-handshake"></i></div>
                <h4>تواصل مهني</h4>
                <p>فرصة لبناء شبكة علاقات دولية متخصصة</p>
            </div>
        </div>
    </div>
</section>
@endif

{{-- Why: لماذا يوم المهنة؟ --}}
@if(isset($sections['why_day']) && $sections['why_day']->is_active)
<section class="section" style="background:#fff;">
    <div class="container">
        <div class="prof-row">
            <div class="prof-content">
                <span class="section-label">الهدف والرؤية</span>
                <h2 class="section-title">{{ $sections['why_day']->title_ar }}</h2>
                <div class="section-divider" style="margin:12px 0 20px;"></div>
                <div class="pd-content-text">
                    {!! nl2br(e($sections['why_day']->content_ar)) !!}
                </div>
            </div>
            <div class="prof-image">
                <div class="pd-img-wrap">
                    @if($sections['why_day']->image)
                        <img src="{{ Storage::url($sections['why_day']->image) }}" alt="{{ $sections['why_day']->title_ar }}">
                    @else
                        <img src="{{ asset('images/smiling-attractive-man-and-senior-smiling-cosmetol-2026-03-19-07-57-58-utc2.webp') }}" alt="{{ $sections['why_day']->title_ar }}">
                    @endif
                    <!-- <div class="pd-img-badge">
                        <i class="fas fa-award"></i>
                        <span>يوم المهنة العالمي</span>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- Celebrations: كيف نحتفل؟ --}}
@if(isset($sections['celebrations']) && $sections['celebrations']->is_active)
<section class="section pd-celebrations">
    <div class="container">
        <div style="text-align:center;margin-bottom:40px;">
            <span class="section-label">فعاليات وأنشطة</span>
            <h2 class="section-title">{{ $sections['celebrations']->title_ar }}</h2>
            <div class="section-divider"></div>
        </div>
        <div style="max-width:720px;margin:0 auto 48px;text-align:center;">
            <p class="pd-content-text">{!! nl2br(e($sections['celebrations']->content_ar)) !!}</p>
        </div>
        <div class="pd-celeb-icons pd-celeb-centered">
            <div class="pd-celeb-item">
                <i class="fas fa-microphone-alt"></i>
                <span>مؤتمرات دولية</span>
            </div>
            <div class="pd-celeb-item">
                <i class="fas fa-paint-brush"></i>
                <span>عروض التزيين والأزياء</span>
            </div>
            <div class="pd-celeb-item">
                <i class="fas fa-trophy"></i>
                <span>مسابقات الإبداع المهني</span>
            </div>
            <div class="pd-celeb-item">
                <i class="fas fa-medal"></i>
                <span>تسليم الجوائز والأوسمة</span>
            </div>
        </div>
    </div>
</section>
@endif

{{-- CTA --}}
<section class="cta-section">
    <div class="container">
        <div class="cta-inner">
            <div class="cta-content">
                <h2>شارك في يوم المهنة العالمي</h2>
                <p>انضم إلى الاحتفال العالمي بمهنة التزيين والتجميل وكن جزءاً من هذا الحدث الدولي المميز.</p>
            </div>
            <div class="cta-actions">
                <a href="{{ route('join') }}" class="btn btn-white">انضم الآن</a>
                <a href="{{ route('contact') }}" class="btn btn-outline-white" style="
    color: #fff;
">تواصل معنا</a>
            </div>
        </div>
    </div>
</section>

</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/post-1671.css') }}">
<style>
/* ── Intro block ── */
.pd-intro {
    text-align: center;
    max-width: 820px;
    margin: 0 auto 60px;
}
.pd-intro-icon {
    width: 70px; height: 70px;
    background: var(--primary);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 28px; color: #fff;
    margin: 0 auto 20px;
}
.pd-intro-text {
    font-size: 17px;
    color: var(--text-muted);
    line-height: 1.9;
    margin: 0;
}

/* ── Highlight cards ── */
.pd-cards {
    display: flex;
    gap: 24px;
    flex-wrap: wrap;
    justify-content: center;
}
.pd-card {
    flex: 1 1 220px;
    max-width: 300px;
    background: #fff;
    border-radius: 18px;
    padding: 32px 24px;
    text-align: center;
    box-shadow: 0 4px 30px rgba(33,102,169,0.09);
    transition: transform 0.3s, box-shadow 0.3s;
}
.pd-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 45px rgba(33,102,169,0.15);
}
.pd-card-icon {
    width: 58px; height: 58px;
    background: var(--bg-light);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 22px; color: var(--primary);
    margin: 0 auto 16px;
    transition: all 0.3s;
}
.pd-card:hover .pd-card-icon { background: var(--primary); color: #fff; }
.pd-card h4 {
    font-family: 'Cormorant','Tajawal',serif;
    font-size: 1.1rem; font-weight: 700;
    color: var(--text-dark); margin-bottom: 8px;
}
.pd-card p { font-size: 14px; color: var(--text-muted); margin: 0; line-height: 1.7; }

/* ── Why section layout ── */
.prof-row { display: flex; align-items: center; gap: 60px; }
.prof-content { flex: 1; }
.prof-image { flex: 0 0 420px; }

.pd-img-wrap {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(33,102,169,0.18);
    height: 380px;
}
.pd-img-wrap img { width: 100%; height: 100%; object-fit: contain; padding: 20px; }
.pd-img-badge {
    position: absolute;
    bottom: 20px; right: 20px;
    background: var(--primary);
    color: #fff;
    border-radius: 12px;
    padding: 10px 18px;
    display: flex; align-items: center; gap: 8px;
    font-size: 13px; font-weight: 600;
    box-shadow: 0 6px 20px rgba(0,0,0,0.2);
}
.pd-img-badge i { font-size: 16px; }

.pd-content-text {
    font-size: 16px;
    color: var(--text-muted);
    line-height: 2;
}

/* ── Celebrations ── */
.pd-celebrations { background: var(--bg-light); }
.pd-celeb-icons {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}
.pd-celeb-centered {
    max-width: 860px;
    margin: 0 auto;
}
.pd-celeb-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    background: #fff;
    border-radius: 14px;
    padding: 22px 16px;
    text-align: center;
    box-shadow: 0 4px 20px rgba(33,102,169,0.08);
}
.pd-celeb-item i {
    font-size: 28px;
    color: var(--primary);
}
.pd-celeb-item span {
    font-size: 13px;
    font-weight: 600;
    color: var(--text-dark);
    line-height: 1.4;
}

/* ── CTA ── */
.cta-section { background: linear-gradient(135deg,var(--primary-dark) 0%,var(--primary) 100%); padding: 80px 0; }
.cta-inner { display: flex; align-items: center; justify-content: space-between; gap: 40px; flex-wrap: wrap; }
.cta-content h2 { font-family: 'Cormorant','Tajawal',serif; font-size: clamp(1.6rem,2.5vw,2.2rem); font-weight: 700; color: #fff; margin-bottom: 10px; }
.cta-content p { color: rgba(255,255,255,0.78); font-size: 15px; }
.cta-actions { display: flex; gap: 14px; flex-wrap: wrap; }

/* ── Responsive ── */
@media (max-width: 991px) {
    .prof-row { flex-direction: column !important; }
    .prof-image { flex: none; width: 100%; }
    .pd-img-wrap { height: 280px; }
    .pd-celeb-icons { grid-template-columns: repeat(2, 1fr); }
    .cta-inner { flex-direction: column; text-align: center; }
    .cta-actions { justify-content: center; }
}
@media (max-width: 575px) {
    .pd-cards { flex-direction: column; align-items: center; }
    .pd-celeb-icons { grid-template-columns: 1fr 1fr; }
}
</style>
@endpush

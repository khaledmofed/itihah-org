@extends('layouts.app')

@section('title', 'الجوائز والأوسمة')

@section('content')

<div class="elementor elementor-1671" dir="rtl">

@include('partials.hero', [
    'heroTitle'      => 'الجوائز والأوسمة',
    'heroDesc'       => 'نكرّم المحترفين المتميزين في مجال التزيين والتجميل من خلال منظومة الجوائز والأوسمة الدولية.',
    'heroBreadcrumb' => 'الجوائز والأوسمة',
])

<section class="section" style="background:#fff;">
    <div class="container">
        <div class="text-center" style="margin-bottom:55px;">
            <span class="section-label">التكريم والتميز</span>
            <h2 class="section-title">جوائز وأوسمة C.M.A.C الدولية</h2>
            <div class="section-divider"></div>
            <p class="section-desc">نكرّم المحترفين المتميزين والمبدعين في مجال التزيين والتجميل من خلال منظومة متكاملة من الجوائز والأوسمة الدولية المعترف بها.</p>
        </div>
        <div class="row">
            @forelse($awards as $award)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="award-card">
                    <div class="award-icon" style="background:{{ $award->badge_color ?? '#2166A9' }}20;color:{{ $award->badge_color ?? '#2166A9' }};">
                        <i class="bi {{ $award->icon ?? 'bi-award-fill' }}" style="font-size:2.2rem;"></i>
                    </div>
                    <h4 class="award-title">{{ $award->title_ar }}</h4>
                    @if($award->title_en)<p style="font-size:12px;color:var(--text-muted);margin-bottom:10px;font-style:italic;">{{ $award->title_en }}</p>@endif
                    <p class="award-desc">{{ Str::limit($award->description_ar, 120) }}</p>
                    <a href="{{ route('awards.show', $award->slug) }}" class="award-link">اعرف أكثر</a>
                </div>
            </div>
            @empty
            <div class="col-12 text-center" style="padding:60px 0;">
                <i class="fas fa-award" style="font-size:4rem;color:var(--primary-light);margin-bottom:15px;display:block;"></i>
                <p style="color:var(--text-muted);">لا توجد جوائز متاحة حالياً.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="section-sm" style="background:var(--bg-light);">
    <div class="container">
        <div style="text-align:center;max-width:600px;margin:0 auto;">
            <h3 style="font-family:'Cormorant','Tajawal',serif;font-size:1.8rem;font-weight:700;color:var(--text-dark);margin-bottom:12px;">هل تستحق التكريم؟</h3>
            <p style="color:var(--text-muted);margin-bottom:25px;">إذا كنت من المتميزين في مجال التزيين والتجميل، تواصل معنا لمعرفة متطلبات الترشح للجوائز والأوسمة.</p>
            <a href="{{ route('contact') }}" class="btn btn-primary">تواصل معنا</a>
        </div>
    </div>
</section>

</div>{{-- end .elementor-1671 --}}

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/post-1671.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
.award-card { background:#fff; border-radius:18px; padding:32px 24px; text-align:center; box-shadow:0 4px 30px rgba(33,102,169,0.07); transition:all 0.3s; height:100%; display:flex; flex-direction:column; align-items:center; }
.award-card:hover { transform:translateY(-6px); box-shadow:0 18px 50px rgba(33,102,169,0.14); }
.award-icon { width:85px; height:85px; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 18px; }
.award-title { font-family:'Cormorant','Tajawal',serif; font-size:1.2rem; font-weight:700; color:var(--text-dark); margin-bottom:10px; }
.award-desc { font-size:14px; color:var(--text-muted); line-height:1.7; margin-bottom:18px; flex:1; }
.award-link { font-size:13px; font-weight:600; color:var(--primary); border:1.5px solid var(--primary); padding:8px 24px; border-radius:30px; transition:all 0.2s; }
.award-link:hover { background:var(--primary); color:#fff !important; }
</style>
@endpush

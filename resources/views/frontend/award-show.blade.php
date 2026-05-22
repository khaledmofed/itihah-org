@extends('layouts.app')

@section('title', $award->title_ar)

@section('content')

<div class="elementor elementor-1671" dir="rtl">

@include('partials.hero', [
    'heroTitle'      => $award->title_ar,
    'heroDesc'       => $award->title_en ?? null,
    'heroBreadcrumb' => 'الجوائز والأوسمة',
])

<section class="section" style="background:#fff;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                {{-- Award Hero --}}
                <div style="background:var(--bg-light);border-radius:20px;padding:50px;text-align:center;margin-bottom:40px;">
                    <div style="width:100px;height:100px;border-radius:50%;background:{{ $award->badge_color ?? '#2166A9' }}20;color:{{ $award->badge_color ?? '#2166A9' }};display:flex;align-items:center;justify-content:center;margin:0 auto 20px;font-size:3rem;">
                        <i class="bi {{ $award->icon ?? 'bi-award-fill' }}"></i>
                    </div>
                    <h2 style="font-family:'Cormorant','Tajawal',serif;font-size:2rem;font-weight:700;color:var(--text-dark);margin-bottom:5px;">{{ $award->title_ar }}</h2>
                    @if($award->title_en)
                    <p style="color:var(--text-muted);font-style:italic;margin:0;">{{ $award->title_en }}</p>
                    @endif
                </div>

                {{-- Description --}}
                @if($award->description_ar)
                <div style="margin-bottom:35px;">
                    <h4 style="font-family:'Cormorant','Tajawal',serif;font-size:1.4rem;font-weight:700;color:var(--text-dark);margin-bottom:15px;">عن الجائزة</h4>
                    <p style="font-size:18px;color:var(--text-muted);line-height:1.9;">{{ $award->description_ar }}</p>
                </div>
                @endif

                {{-- Criteria --}}
                @if($award->criteria_ar)
                <div style="background:var(--bg-light);border-radius:16px;padding:30px;">
                    <h4 style="font-family:'Cormorant','Tajawal',serif;font-size:1.4rem;font-weight:700;color:var(--text-dark);margin-bottom:20px;"><i class="fas fa-list-check" style="color:var(--primary);margin-left:8px;"></i> معايير الترشح</h4>
                    @foreach(explode("\n", $award->criteria_ar) as $criterion)
                    @if(trim($criterion))
                    <div style="display:flex;align-items:flex-start;gap:12px;margin-bottom:12px;">
                        <i class="fas fa-check-circle" style="color:var(--primary);margin-top:3px;flex-shrink:0;"></i>
                        <span style="font-size:15px;color:var(--text-muted);">{{ trim($criterion) }}</span>
                    </div>
                    @endif
                    @endforeach
                </div>
                @endif

                <div style="margin-top:30px;">
                    <a href="{{ route('contact') }}" class="btn btn-primary">تواصل للترشح</a>
                    <a href="{{ route('awards') }}" class="btn btn-outline" style="margin-right:12px;">جميع الجوائز</a>
                </div>
            </div>

            {{-- Related Awards --}}
            <div class="col-lg-4">
                @if($related->count() > 0)
                <div style="background:#fff;border-radius:18px;box-shadow:0 4px 30px rgba(33,102,169,0.08);padding:28px;">
                    <h6 style="font-size:14px;font-weight:700;color:var(--primary);margin-bottom:20px;text-transform:uppercase;letter-spacing:1px;">جوائز أخرى</h6>
                    @foreach($related as $rel)
                    <a href="{{ route('awards.show', $rel->slug) }}" style="display:flex;align-items:center;gap:14px;padding:14px 0;border-bottom:1px solid var(--bg-light);text-decoration:none;transition:opacity 0.2s;">
                        <div style="width:48px;height:48px;border-radius:12px;background:{{ $rel->badge_color ?? '#2166A9' }}15;color:{{ $rel->badge_color ?? '#2166A9' }};display:flex;align-items:center;justify-content:center;font-size:1.3rem;flex-shrink:0;">
                            <i class="bi {{ $rel->icon ?? 'bi-award-fill' }}"></i>
                        </div>
                        <div>
                            <div style="font-size:14px;font-weight:600;color:var(--text-dark);">{{ $rel->title_ar }}</div>
                            @if($rel->title_en)<div style="font-size:12px;color:var(--text-muted);font-style:italic;">{{ $rel->title_en }}</div>@endif
                        </div>
                    </a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

</div>{{-- end .elementor-1671 --}}

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/post-1671.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
.col-lg-8 { width:100%; }
.col-lg-4 { width:100%; }
@media (min-width:992px) {
    .col-lg-8 { width:66.667%; }
    .col-lg-4 { width:33.333%; }
    .row { display:flex; flex-wrap:wrap; margin:0 -15px; }
    .row > * { padding:0 15px; }
}
</style>
@endpush

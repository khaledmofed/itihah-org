@extends('layouts.app')

@section('title', $event->title_ar)

@section('content')

<div class="elementor elementor-1671" dir="rtl">

@include('partials.hero', [
    'heroTitle'      => $event->title_ar,
    'heroDesc'       => $event->location_ar ?? null,
    'heroBreadcrumb' => 'الفعاليات والأنشطة',
])

<section class="py-6">
    <div class="container">
        <div class="row g-5">
            {{-- Main Content --}}
            <div class="col-lg-8">
                @if($event->image)
                <div class="rounded-4 overflow-hidden shadow-sm mb-5" style="height:420px;">
                    <img src="{{ Storage::url($event->image) }}" class="w-100 h-100 object-fit-cover" alt="{{ $event->title_ar }}">
                </div>
                @endif

                @if($event->description_ar)
                <div class="card border-0 rounded-4 p-4 shadow-sm mb-4">
                    <h4 class="fw-bold mb-4" style="color:var(--primary);">عن الفعالية</h4>
                    <div class="lh-lg text-muted">
                        {!! nl2br(e($event->description_ar)) !!}
                    </div>
                </div>
                @endif

                {{-- Gallery --}}
                @if($event->gallery && count($event->gallery))
                <div class="card border-0 rounded-4 p-4 shadow-sm mb-4">
                    <h4 class="fw-bold mb-4" style="color:var(--primary);">معرض الصور</h4>
                    <div class="row g-3">
                        @foreach($event->gallery as $img)
                        <div class="col-4">
                            <div class="rounded-3 overflow-hidden" style="height:150px;">
                                <img src="{{ Storage::url($img) }}" class="w-100 h-100 object-fit-cover" alt="">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4">
                <div class="ev-sidebar sticky-top" style="top:100px;">
                    <div class="ev-sidebar-header">
                        <i class="fas fa-info-circle"></i>
                        <h5>تفاصيل الفعالية</h5>
                    </div>

                    @if($event->event_date)
                    <div class="ev-detail-item">
                        <div class="ev-detail-icon"><i class="fas fa-calendar-alt"></i></div>
                        <div class="ev-detail-content">
                            <span class="ev-detail-label">التاريخ</span>
                            <span class="ev-detail-value">{{ $event->event_date->translatedFormat('d F Y') }}</span>
                        </div>
                    </div>
                    @endif

                    @if($event->location_ar)
                    <div class="ev-detail-item">
                        <div class="ev-detail-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="ev-detail-content">
                            <span class="ev-detail-label">المكان</span>
                            <span class="ev-detail-value">{{ $event->location_ar }}</span>
                        </div>
                    </div>
                    @endif

                    @if($event->category)
                    @php $cats = ['forum' => 'الملتقى المهني التجميلي', 'top_beauty' => 'التوب بيوتي', 'profession_day_celebration' => 'احتفال يوم المهنة العالمي']; @endphp
                    <div class="ev-detail-item">
                        <div class="ev-detail-icon"><i class="fas fa-tag"></i></div>
                        <div class="ev-detail-content">
                            <span class="ev-detail-label">التصنيف</span>
                            <span class="ev-detail-value">{{ $cats[$event->category] ?? $event->category }}</span>
                        </div>
                    </div>
                    @endif

                    <div class="ev-sidebar-cta">
                        <a href="{{ route('contact') }}" class="btn btn-primary rounded-pill w-100 d-flex align-items-center justify-content-center gap-2">
                            <i class="fas fa-envelope"></i> تواصل معنا
                        </a>
                        <a href="{{ route('events') }}" class="btn btn-outline-primary rounded-pill w-100 mt-2 d-flex align-items-center justify-content-center gap-2">
                            <i class="fas fa-th-list"></i> جميع الفعاليات
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Related Events --}}
        @if($related->count())
        <div class="mt-6 pt-5 border-top">
            <h4 class="fw-bold mb-4">فعاليات أخرى</h4>
            <div class="row g-4">
                @foreach($related as $r)
                <div class="col-md-4">
                    <div class="event-card h-100">
                        <div class="event-card-image">
                            @if($r->image)
                            <img src="{{ Storage::url($r->image) }}" alt="{{ $r->title_ar }}" class="w-100 h-100 object-fit-cover">
                            @else
                            <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background:var(--primary-lighter);">
                                <i class="bi bi-calendar-event" style="font-size:3rem; color:var(--primary); opacity:0.5;"></i>
                            </div>
                            @endif
                        </div>
                        <div class="event-card-body">
                            <h5 class="fw-bold mb-2">{{ $r->title_ar }}</h5>
                            <a href="{{ route('events.show', $r->slug) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">اقرأ المزيد</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

</div>{{-- end .elementor-1671 --}}

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/post-1671.css') }}">
<style>
.py-6 { padding-top: 5rem; padding-bottom: 5rem; }
.mt-6 { margin-top: 5rem; }
.lh-lg { line-height: 1.9; }
.object-fit-cover { object-fit: cover; }

.event-card-image {
    height: 220px;
    overflow: hidden;
    border-radius: 14px 14px 0 0;
}
.event-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.event-card {
    background: #fff;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 4px 24px rgba(33,102,169,0.09);
    transition: transform 0.3s, box-shadow 0.3s;
}
.event-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 14px 40px rgba(33,102,169,0.15);
}
.event-card-body {
    padding: 18px 20px 20px;
}
.event-card-body h5 {
    font-family: 'Cormorant','Tajawal', serif;
    font-size: 1rem;
    line-height: 1.4;
    color: var(--text-dark);
    margin-bottom: 14px;
}

/* ── Event Sidebar ── */
.ev-sidebar {
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 6px 32px rgba(33,102,169,0.10);
    overflow: hidden;
}
.ev-sidebar-header {
    background: linear-gradient(135deg, var(--primary-dark), var(--primary));
    padding: 22px 24px;
    display: flex;
    align-items: center;
    gap: 12px;
}
.ev-sidebar-header i {
    font-size: 20px;
    color: rgba(255,255,255,0.85);
}
.ev-sidebar-header h5 {
    color: #fff;
    font-family: 'Cormorant','Tajawal', serif;
    font-size: 1.15rem;
    font-weight: 700;
    margin: 0;
}
.ev-detail-item {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 16px 24px;
    border-bottom: 1px solid #f0f4f8;
}
.ev-detail-item:last-of-type { border-bottom: none; }
.ev-detail-icon {
    width: 42px;
    height: 42px;
    border-radius: 12px;
    background: var(--bg-light);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.ev-detail-icon i {
    font-size: 16px;
    color: var(--primary);
}
.ev-detail-content {
    display: flex;
    flex-direction: column;
    gap: 2px;
}
.ev-detail-label {
    font-size: 11px;
    color: var(--text-muted);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.ev-detail-value {
    font-size: 15px;
    font-weight: 700;
    color: var(--text-dark);
}
.ev-sidebar-cta {
    padding: 20px 24px 24px;
    background: #f8fafc;
}
</style>
@endpush

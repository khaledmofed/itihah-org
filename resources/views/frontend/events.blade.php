@extends('layouts.app')

@section('title', 'الفعاليات والأنشطة')

@section('content')

<div class="elementor elementor-1671" dir="rtl">

@include('partials.hero', [
    'heroTitle'      => 'الفعاليات والأنشطة',
    'heroDesc'       => 'فعاليات دولية متخصصة في مجال التزيين والتجميل تجمع المهنيين من حول العالم.',
    'heroBreadcrumb' => 'الفعاليات والأنشطة',
])

<section class="section" style="background:#fff;">
    <div class="container">

        {{-- Category Filter --}}
        <div style="display:flex;flex-wrap:wrap;gap:10px;justify-content:center;margin-bottom:45px;">
            <a href="{{ route('events') }}" class="filter-btn {{ !request('category') ? 'filter-btn-active' : '' }}">الكل</a>
            @foreach($categories as $key => $label)
            <a href="{{ route('events') }}?category={{ $key }}" class="filter-btn {{ request('category') === $key ? 'filter-btn-active' : '' }}">{{ $label }}</a>
            @endforeach
        </div>

        @if($events->count())
        <div class="row">
            @foreach($events as $event)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="event-card">
                    @if($event->image)
                    <div class="event-card-img"><img src="{{ Storage::url($event->image) }}" alt="{{ $event->title_ar }}"></div>
                    @else
                    <div class="event-card-img event-card-img-placeholder"><i class="fas fa-calendar-alt"></i></div>
                    @endif
                    <div class="event-card-body">
                        @if($event->category && isset($categories[$event->category]))
                        <span class="badge">{{ $categories[$event->category] }}</span>
                        @endif
                        <h5 class="event-title">{{ $event->title_ar }}</h5>
                        @if($event->event_date)
                        <div class="event-meta">
                            <i class="fas fa-calendar" style="color:var(--primary);"></i>
                            <span>{{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d M Y') }}</span>
                            @if($event->location_ar)
                            &nbsp;&nbsp;<i class="fas fa-map-marker-alt" style="color:var(--primary);"></i>
                            <span>{{ $event->location_ar }}</span>
                            @endif
                        </div>
                        @endif
                        @if($event->description_ar)
                        <p class="event-desc">{{ Str::limit($event->description_ar, 100) }}</p>
                        @endif
                        <a href="{{ route('events.show', $event->slug) }}" class="event-link">التفاصيل <i class="fas fa-arrow-left"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div style="margin-top:40px;display:flex;justify-content:center;">
            {{ $events->links('vendor.pagination.cmac') }}
        </div>

        @else
        <div style="text-align:center;padding:80px 0;">
            <i class="fas fa-calendar-times" style="font-size:4rem;color:var(--primary-light);margin-bottom:20px;display:block;opacity:0.5;"></i>
            <h4 style="color:var(--text-muted);font-family:'Cormorant','Tajawal',serif;">لا توجد فعاليات حالياً</h4>
            <p style="color:var(--text-muted);font-size:14px;">تابعونا لمعرفة الفعاليات القادمة</p>
        </div>
        @endif
    </div>
</section>

</div>{{-- end .elementor-1671 --}}

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/post-1671.css') }}">
<style>
.filter-btn { display:inline-block; padding:9px 24px; border-radius:30px; font-size:14px; font-weight:600; color:var(--text-muted) !important; background:#f8f9fa !important; transition:all 0.2s; border:1.5px solid transparent; text-decoration:none !important; white-space:nowrap; }
.filter-btn:hover, .filter-btn-active { background:var(--primary) !important; color:#fff !important; border-color:var(--primary) !important; }
.event-card { background:#fff; border-radius:18px; overflow:hidden; box-shadow:0 4px 30px rgba(33,102,169,0.07); transition:all 0.3s; height:100%; display:flex; flex-direction:column; }
.event-card:hover { transform:translateY(-6px); box-shadow:0 18px 50px rgba(33,102,169,0.14); }
.event-card-img { overflow:hidden; height:220px; }
.event-card-img img { width:100%; height:100%; object-fit:cover; transition:transform 0.4s; }
.event-card:hover .event-card-img img { transform:scale(1.05); }
.event-card-img-placeholder { background:var(--bg-light); display:flex; align-items:center; justify-content:center; color:var(--primary); font-size:3rem; }
.event-card-body { padding:22px; flex:1; display:flex; flex-direction:column; }
.event-card-body .badge { align-self:flex-start; display:inline-block; width:auto; }
.event-title { font-family:'Cormorant','Tajawal',serif; font-size:1.15rem; font-weight:700; color:var(--text-dark); margin:10px 0; line-height:1.3; }
.event-meta { display:flex; align-items:center; gap:6px; font-size:13px; color:var(--text-muted); margin-bottom:10px; flex-wrap:wrap; }
.event-desc { font-size:14px; color:var(--text-muted); line-height:1.65; flex:1; }
.event-link { display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:600; color:var(--primary); margin-top:15px; }
.event-link:hover { color:var(--primary-dark); }
</style>
@endpush

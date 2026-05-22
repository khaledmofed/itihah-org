@extends('layouts.admin')

@section('title', 'لوحة التحكم')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-speedometer2 me-2" style="color:var(--primary);"></i> لوحة التحكم</h1>
    <div class="text-muted small">{{ now()->translatedFormat('l، d F Y') }}</div>
</div>

{{-- Stats --}}
<div class="row g-4 mb-4">
    @php
    $widgets = [
        ['label' => 'السلايدر', 'val' => $counts['sliders'], 'icon' => 'bi-images', 'color' => '#2166A9', 'bg' => '#e8f0fa', 'route' => route('admin.sliders.index')],
        ['label' => 'المسارات التعليمية', 'val' => $counts['education'], 'icon' => 'bi-mortarboard', 'color' => '#28a745', 'bg' => '#e8f8ed', 'route' => route('admin.education.index')],
        ['label' => 'الفعاليات', 'val' => $counts['events'], 'icon' => 'bi-calendar-event', 'color' => '#fd7e14', 'bg' => '#fff4e8', 'route' => route('admin.events.index')],
        ['label' => 'الجوائز', 'val' => $counts['awards'], 'icon' => 'bi-award', 'color' => '#dc3545', 'bg' => '#fceaec', 'route' => route('admin.awards.index')],
        ['label' => 'الداعمون', 'val' => $counts['supporters'], 'icon' => 'bi-building', 'color' => '#6f42c1', 'bg' => '#f0eafb', 'route' => route('admin.supporters.index')],
        ['label' => 'الأخبار', 'val' => $counts['news'], 'icon' => 'bi-newspaper', 'color' => '#0dcaf0', 'bg' => '#e6f9fd', 'route' => route('admin.news.index')],
        ['label' => 'الوسائط', 'val' => $counts['media'], 'icon' => 'bi-collection-play', 'color' => '#8ac2e0', 'bg' => '#eaf4fb', 'route' => route('admin.media.index')],
        ['label' => 'المستخدمون', 'val' => $counts['users'], 'icon' => 'bi-people', 'color' => '#6c757d', 'bg' => '#f0f0f0', 'route' => route('admin.users.index')],
    ];
    @endphp
    @foreach($widgets as $w)
    <div class="col-sm-6 col-md-4 col-xl-3">
        <a href="{{ $w['route'] }}" class="text-decoration-none">
            <div class="stat-widget">
                <div class="stat-widget-icon" style="background:{{ $w['bg'] }}; color:{{ $w['color'] }};">
                    <i class="bi {{ $w['icon'] }}"></i>
                </div>
                <div>
                    <div class="stat-widget-val" style="color:{{ $w['color'] }};">{{ $w['val'] }}</div>
                    <div class="stat-widget-label">{{ $w['label'] }}</div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>

{{-- Quick Actions --}}
<div class="row g-4 mb-4">
    <div class="col-lg-6">
        <div class="admin-card card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <span><i class="bi bi-lightning-charge me-2" style="color:var(--primary);"></i> إجراءات سريعة</span>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    @php
                    $actions = [
                        ['label'=>'إضافة سلايد', 'icon'=>'bi-plus-circle', 'route'=>route('admin.sliders.create'), 'color'=>'primary'],
                        ['label'=>'إضافة فعالية', 'icon'=>'bi-plus-circle', 'route'=>route('admin.events.create'), 'color'=>'success'],
                        ['label'=>'إضافة خبر', 'icon'=>'bi-plus-circle', 'route'=>route('admin.news.create'), 'color'=>'info'],
                        ['label'=>'إضافة جائزة', 'icon'=>'bi-plus-circle', 'route'=>route('admin.awards.create'), 'color'=>'warning'],
                        ['label'=>'رفع وسائط', 'icon'=>'bi-cloud-upload', 'route'=>route('admin.media.index'), 'color'=>'secondary'],
                        ['label'=>'الإعدادات', 'icon'=>'bi-gear', 'route'=>route('admin.settings'), 'color'=>'dark'],
                    ];
                    @endphp
                    @foreach($actions as $a)
                    <div class="col-6">
                        <a href="{{ $a['route'] }}" class="btn btn-outline-{{ $a['color'] }} rounded-3 w-100 d-flex align-items-center gap-2 justify-content-center">
                            <i class="bi {{ $a['icon'] }}"></i> {{ $a['label'] }}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="admin-card card h-100">
            <div class="card-header">
                <i class="bi bi-calendar-event me-2" style="color:var(--primary);"></i> آخر الفعاليات
            </div>
            <div class="card-body p-0">
                @if(isset($latestEvents) && $latestEvents->count())
                <div class="list-group list-group-flush rounded-bottom-3">
                    @foreach($latestEvents as $event)
                    <div class="list-group-item d-flex align-items-center justify-content-between gap-2 px-4">
                        <div>
                            <div class="small fw-bold">{{ Str::limit($event->title_ar, 45) }}</div>
                            <div class="text-muted" style="font-size:0.78rem;">
                                {{ $event->event_date?->translatedFormat('d M Y') ?? '—' }}
                                @if($event->location_ar) · {{ Str::limit($event->location_ar, 20) }} @endif
                            </div>
                        </div>
                        <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-sm btn-outline-primary rounded-2">
                            <i class="bi bi-pencil"></i>
                        </a>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center text-muted py-5">لا توجد فعاليات</div>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Site Link --}}
<div class="admin-card card p-4 d-flex flex-row align-items-center gap-3">
    <i class="bi bi-globe fs-3" style="color:var(--primary);"></i>
    <div class="flex-grow-1">
        <div class="fw-bold mb-1">موقع الاتحاد</div>
        <div class="text-muted small">عرض الموقع العام للزوار</div>
    </div>
    <a href="{{ route('home') }}" target="_blank" class="btn btn-primary rounded-3 px-4">
        <i class="bi bi-box-arrow-up-left me-1"></i> زيارة الموقع
    </a>
</div>

@endsection

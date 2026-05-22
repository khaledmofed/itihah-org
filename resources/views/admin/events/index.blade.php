@extends('layouts.admin')

@section('title', 'الفعاليات')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-calendar-event me-2" style="color:var(--primary);"></i> الفعاليات</h1>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary rounded-3">
        <i class="bi bi-plus-lg me-1"></i> إضافة فعالية
    </a>
</div>

@php
$categories = ['forum' => 'الملتقى المهني التجميلي', 'top_beauty' => 'التوب بيوتي', 'profession_day_celebration' => 'احتفال يوم المهنة'];
@endphp

<div class="admin-card card">
    <div class="card-body p-0">
        @if($events->count())
        <div class="table-responsive">
            <table class="table admin-table mb-0">
                <thead>
                    <tr>
                        <th>الصورة</th>
                        <th>الفعالية</th>
                        <th>التصنيف</th>
                        <th>التاريخ</th>
                        <th>المكان</th>
                        <th>الحالة</th>
                        <th width="140">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                    <tr>
                        <td>
                            @if($event->image)
                            <img src="{{ Storage::url($event->image) }}" class="rounded-2" style="width:60px;height:45px;object-fit:cover;">
                            @else
                            <div class="rounded-2 bg-light d-flex align-items-center justify-content-center" style="width:60px;height:45px;">
                                <i class="bi bi-calendar-event text-muted"></i>
                            </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold">{{ Str::limit($event->title_ar, 50) }}</div>
                            <div class="text-muted small" dir="ltr">{{ $event->slug }}</div>
                        </td>
                        <td>
                            @if($event->category)
                            <span class="badge rounded-pill bg-primary" style="font-size:0.75rem;">{{ $categories[$event->category] ?? $event->category }}</span>
                            @endif
                        </td>
                        <td>{{ $event->event_date?->translatedFormat('d M Y') ?? '—' }}</td>
                        <td>{{ Str::limit($event->location_ar ?? '—', 25) }}</td>
                        <td>
                            <span class="badge rounded-pill {{ $event->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $event->is_active ? 'مفعّل' : 'معطّل' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-sm btn-outline-primary rounded-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST"
                                    onsubmit="return confirm('هل أنت متأكد؟')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-2"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-3">{{ $events->links() }}</div>
        @else
        <div class="text-center py-5 text-muted">
            <i class="bi bi-calendar-event display-3 d-block mb-3 opacity-25"></i>
            <p>لا توجد فعاليات بعد</p>
            <a href="{{ route('admin.events.create') }}" class="btn btn-primary rounded-3">إضافة فعالية</a>
        </div>
        @endif
    </div>
</div>

@endsection

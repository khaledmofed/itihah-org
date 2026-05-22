@extends('layouts.admin')

@section('title', 'يوم المهنة العالمي')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-calendar-star me-2" style="color:var(--primary);"></i> يوم المهنة العالمي</h1>
    <a href="{{ route('admin.profession-day.create') }}" class="btn btn-primary rounded-3">
        <i class="bi bi-plus-lg me-1"></i> إضافة قسم
    </a>
</div>

<div class="admin-card card">
    <div class="card-body p-0">
        @if($sections->count())
        <div class="table-responsive">
            <table class="table admin-table mb-0">
                <thead>
                    <tr>
                        <th>المفتاح</th>
                        <th>العنوان</th>
                        <th>الترتيب</th>
                        <th>الحالة</th>
                        <th width="140">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sections as $section)
                    <tr>
                        <td><code class="bg-light px-2 py-1 rounded">{{ $section->section_key }}</code></td>
                        <td>
                            <div class="fw-bold">{{ $section->title_ar }}</div>
                            @if($section->content_ar)
                            <div class="text-muted small">{{ Str::limit($section->content_ar, 70) }}</div>
                            @endif
                        </td>
                        <td>{{ $section->order }}</td>
                        <td>
                            <span class="badge rounded-pill {{ $section->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $section->is_active ? 'مفعّل' : 'معطّل' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.profession-day.edit', $section->id) }}" class="btn btn-sm btn-outline-primary rounded-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.profession-day.destroy', $section->id) }}" method="POST"
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
        @else
        <div class="text-center py-5 text-muted">
            <i class="bi bi-calendar-star display-3 d-block mb-3 opacity-25"></i>
            <p>لا توجد أقسام بعد</p>
            <a href="{{ route('admin.profession-day.create') }}" class="btn btn-primary rounded-3">إضافة قسم</a>
        </div>
        @endif
    </div>
</div>

@endsection

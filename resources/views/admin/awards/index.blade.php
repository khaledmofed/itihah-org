@extends('layouts.admin')

@section('title', 'الجوائز والأوسمة')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-award me-2" style="color:var(--primary);"></i> الجوائز والأوسمة</h1>
    <a href="{{ route('admin.awards.create') }}" class="btn btn-primary rounded-3">
        <i class="bi bi-plus-lg me-1"></i> إضافة جائزة
    </a>
</div>

<div class="admin-card card">
    <div class="card-body p-0">
        @if($awards->count())
        <div class="table-responsive">
            <table class="table admin-table mb-0">
                <thead>
                    <tr>
                        <th>الجائزة</th>
                        <th>الأيقونة</th>
                        <th>الترتيب</th>
                        <th>الحالة</th>
                        <th width="140">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($awards as $award)
                    <tr>
                        <td>
                            <div class="fw-bold">{{ $award->title_ar }}</div>
                            @if($award->description_ar)
                            <div class="text-muted small">{{ Str::limit($award->description_ar, 70) }}</div>
                            @endif
                        </td>
                        <td>
                            @if($award->icon)
                            <i class="bi {{ $award->icon }} fs-4" style="color:{{ $award->badge_color ?? 'var(--primary)' }};"></i>
                            @else
                            <i class="bi bi-award-fill fs-4" style="color:{{ $award->badge_color ?? 'var(--primary)' }};"></i>
                            @endif
                        </td>
                        <td>{{ $award->order ?? 0 }}</td>
                        <td>
                            <span class="badge rounded-pill {{ $award->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $award->is_active ? 'مفعّل' : 'معطّل' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.awards.edit', $award->id) }}" class="btn btn-sm btn-outline-primary rounded-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.awards.destroy', $award->id) }}" method="POST"
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
            <i class="bi bi-award display-3 d-block mb-3 opacity-25"></i>
            <p>لا توجد جوائز بعد</p>
            <a href="{{ route('admin.awards.create') }}" class="btn btn-primary rounded-3">إضافة جائزة</a>
        </div>
        @endif
    </div>
</div>

@endsection

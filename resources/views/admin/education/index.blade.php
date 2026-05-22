@extends('layouts.admin')

@section('title', 'المسارات التعليمية')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-mortarboard me-2" style="color:var(--primary);"></i> المسارات التعليمية</h1>
    <a href="{{ route('admin.education.create') }}" class="btn btn-primary rounded-3">
        <i class="bi bi-plus-lg me-1"></i> إضافة مسار
    </a>
</div>

@php $categories = ['taheel' => 'تأهيل', 'tatweer' => 'تطوير', 'certificates' => 'فئة الشهادات']; @endphp

<div class="admin-card card">
    <div class="card-body p-0">
        @if($paths->count())
        <div class="table-responsive">
            <table class="table admin-table mb-0">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>التصنيف</th>
                        <th>المستوى</th>
                        <th>المدة</th>
                        <th>الترتيب</th>
                        <th>الحالة</th>
                        <th width="140">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paths as $path)
                    <tr>
                        <td>
                            <div class="fw-bold">{{ $path->title_ar }}</div>
                            @if($path->title_en)
                            <div class="text-muted small" dir="ltr">{{ $path->title_en }}</div>
                            @endif
                        </td>
                        <td>
                            <span class="badge rounded-pill bg-primary">{{ $categories[$path->category] ?? $path->category }}</span>
                        </td>
                        <td>{{ $path->level ?? '—' }}</td>
                        <td>{{ $path->duration ?? '—' }}</td>
                        <td>{{ $path->order ?? 0 }}</td>
                        <td>
                            <span class="badge rounded-pill {{ $path->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $path->is_active ? 'مفعّل' : 'معطّل' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.education.edit', $path->id) }}" class="btn btn-sm btn-outline-primary rounded-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.education.destroy', $path->id) }}" method="POST"
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
            <i class="bi bi-mortarboard display-3 d-block mb-3 opacity-25"></i>
            <p>لا توجد مسارات بعد</p>
            <a href="{{ route('admin.education.create') }}" class="btn btn-primary rounded-3">إضافة مسار</a>
        </div>
        @endif
    </div>
</div>

@endsection

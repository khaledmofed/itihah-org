@extends('layouts.admin')

@section('title', 'الإحصاءات')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-bar-chart me-2" style="color:var(--primary);"></i> الإحصاءات</h1>
    <a href="{{ route('admin.statistics.create') }}" class="btn btn-primary rounded-3">
        <i class="bi bi-plus-lg me-1"></i> إضافة إحصائية
    </a>
</div>

<div class="admin-card card">
    <div class="card-body p-0">
        @if($statistics->count())
        <div class="table-responsive">
            <table class="table admin-table mb-0">
                <thead>
                    <tr>
                        <th>التسمية</th>
                        <th>القيمة</th>
                        <th>اللاحقة</th>
                        <th>الأيقونة</th>
                        <th>الترتيب</th>
                        <th>الحالة</th>
                        <th width="140">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($statistics as $stat)
                    <tr>
                        <td>
                            <div class="fw-bold">{{ $stat->label_ar }}</div>
                            @if($stat->label_en) <div class="text-muted small" dir="ltr">{{ $stat->label_en }}</div> @endif
                        </td>
                        <td><span class="fw-bold fs-5" style="color:var(--primary);">{{ $stat->value }}</span></td>
                        <td>{{ $stat->suffix ?? '—' }}</td>
                        <td>
                            @if($stat->icon)
                            <i class="bi {{ $stat->icon }} fs-4" style="color:var(--primary);"></i>
                            @else —
                            @endif
                        </td>
                        <td>{{ $stat->order ?? 0 }}</td>
                        <td>
                            <span class="badge rounded-pill {{ $stat->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $stat->is_active ? 'مفعّل' : 'معطّل' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.statistics.edit', $stat->id) }}" class="btn btn-sm btn-outline-primary rounded-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.statistics.destroy', $stat->id) }}" method="POST"
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
            <i class="bi bi-bar-chart display-3 d-block mb-3 opacity-25"></i>
            <p>لا توجد إحصاءات بعد</p>
            <a href="{{ route('admin.statistics.create') }}" class="btn btn-primary rounded-3">إضافة إحصائية</a>
        </div>
        @endif
    </div>
</div>

@endsection

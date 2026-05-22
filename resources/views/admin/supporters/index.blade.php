@extends('layouts.admin')

@section('title', 'الداعمون')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-building me-2" style="color:var(--primary);"></i> الداعمون</h1>
    <a href="{{ route('admin.supporters.create') }}" class="btn btn-primary rounded-3">
        <i class="bi bi-plus-lg me-1"></i> إضافة داعم
    </a>
</div>

<div class="admin-card card">
    <div class="card-body p-0">
        @if($supporters->count())
        <div class="table-responsive">
            <table class="table admin-table mb-0">
                <thead>
                    <tr>
                        <th width="80">الشعار</th>
                        <th>الاسم</th>
                        <th>النوع</th>
                        <th>الترتيب</th>
                        <th>الحالة</th>
                        <th width="140">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($supporters as $s)
                    <tr>
                        <td>
                            @if($s->logo)
                            <img src="{{ Storage::url($s->logo) }}" style="max-height:45px;max-width:80px;object-fit:contain;">
                            @else
                            <i class="bi bi-building text-muted fs-4"></i>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold">{{ $s->name_ar }}</div>
                            @if($s->name_en) <div class="text-muted small" dir="ltr">{{ $s->name_en }}</div> @endif
                        </td>
                        <td>{{ $s->type ?? '—' }}</td>
                        <td>{{ $s->order ?? 0 }}</td>
                        <td>
                            <span class="badge rounded-pill {{ $s->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $s->is_active ? 'مفعّل' : 'معطّل' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.supporters.edit', $s->id) }}" class="btn btn-sm btn-outline-primary rounded-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.supporters.destroy', $s->id) }}" method="POST"
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
            <i class="bi bi-building display-3 d-block mb-3 opacity-25"></i>
            <p>لا يوجد داعمون بعد</p>
            <a href="{{ route('admin.supporters.create') }}" class="btn btn-primary rounded-3">إضافة داعم</a>
        </div>
        @endif
    </div>
</div>

@endsection

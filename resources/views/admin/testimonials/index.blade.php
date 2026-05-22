@extends('layouts.admin')

@section('title', 'شهادات العملاء')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-chat-quote me-2" style="color:var(--primary);"></i> شهادات العملاء</h1>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary rounded-3">
        <i class="bi bi-plus-lg me-1"></i> إضافة شهادة
    </a>
</div>

@if(session('success'))
<div class="alert alert-success rounded-3 mb-4">{{ session('success') }}</div>
@endif

<div class="admin-card card">
    <div class="card-body p-0">
        @if($testimonials->count())
        <div class="table-responsive">
            <table class="table admin-table mb-0">
                <thead>
                    <tr>
                        <th width="70">الصورة</th>
                        <th>الاسم والدور</th>
                        <th>المحتوى</th>
                        <th>التقييم</th>
                        <th>الترتيب</th>
                        <th>الحالة</th>
                        <th width="130">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonials as $t)
                    <tr>
                        <td>
                            @if($t->image)
                            <img src="{{ Storage::url($t->image) }}" style="width:48px;height:48px;object-fit:cover;border-radius:50%;">
                            @else
                            <div style="width:48px;height:48px;border-radius:50%;background:#e9ecef;display:flex;align-items:center;justify-content:center;">
                                <i class="bi bi-person text-muted fs-5"></i>
                            </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold">{{ $t->name_ar }}</div>
                            @if($t->role_ar) <div class="text-muted small">{{ $t->role_ar }}</div> @endif
                        </td>
                        <td><div style="max-width:280px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;font-size:13px;color:#666;">{{ $t->content_ar }}</div></td>
                        <td>
                            <span style="color:#f59e0b;font-size:13px;">
                                @for($i = 1; $i <= 5; $i++)
                                <i class="bi bi-star{{ $i <= $t->rating ? '-fill' : '' }}"></i>
                                @endfor
                            </span>
                        </td>
                        <td>{{ $t->sort_order }}</td>
                        <td>
                            <span class="badge rounded-pill {{ $t->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $t->is_active ? 'مفعّل' : 'معطّل' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.testimonials.edit', $t->id) }}" class="btn btn-sm btn-outline-primary rounded-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.testimonials.destroy', $t->id) }}" method="POST"
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
        <div class="p-3">{{ $testimonials->links() }}</div>
        @else
        <div class="text-center py-5 text-muted">
            <i class="bi bi-chat-quote display-3 d-block mb-3 opacity-25"></i>
            <p>لا توجد شهادات بعد</p>
            <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary rounded-3">إضافة شهادة</a>
        </div>
        @endif
    </div>
</div>

@endsection

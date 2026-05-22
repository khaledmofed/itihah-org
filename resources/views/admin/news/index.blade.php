@extends('layouts.admin')

@section('title', 'الأخبار')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-newspaper me-2" style="color:var(--primary);"></i> الأخبار</h1>
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary rounded-3">
        <i class="bi bi-plus-lg me-1"></i> إضافة خبر
    </a>
</div>

<div class="admin-card card">
    <div class="card-body p-0">
        @if($news->count())
        <div class="table-responsive">
            <table class="table admin-table mb-0">
                <thead>
                    <tr>
                        <th width="70">الصورة</th>
                        <th>العنوان</th>
                        <th>المؤلف</th>
                        <th>تاريخ النشر</th>
                        <th>الحالة</th>
                        <th width="140">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $item)
                    <tr>
                        <td>
                            @if($item->image)
                            <img src="{{ Storage::url($item->image) }}" class="rounded-2" style="width:60px;height:45px;object-fit:cover;">
                            @else
                            <div class="rounded-2 bg-light d-flex align-items-center justify-content-center" style="width:60px;height:45px;">
                                <i class="bi bi-newspaper text-muted"></i>
                            </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold">{{ Str::limit($item->title_ar, 55) }}</div>
                            @if($item->excerpt_ar)
                            <div class="text-muted small">{{ Str::limit($item->excerpt_ar, 60) }}</div>
                            @endif
                        </td>
                        <td>{{ $item->author ?? '—' }}</td>
                        <td>{{ $item->published_at?->translatedFormat('d M Y') ?? '—' }}</td>
                        <td>
                            <span class="badge rounded-pill {{ $item->is_published ? 'bg-success' : 'bg-warning text-dark' }}">
                                {{ $item->is_published ? 'منشور' : 'مسودة' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-sm btn-outline-primary rounded-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST"
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
        <div class="p-3">{{ $news->links() }}</div>
        @else
        <div class="text-center py-5 text-muted">
            <i class="bi bi-newspaper display-3 d-block mb-3 opacity-25"></i>
            <p>لا توجد أخبار بعد</p>
            <a href="{{ route('admin.news.create') }}" class="btn btn-primary rounded-3">إضافة خبر</a>
        </div>
        @endif
    </div>
</div>

@endsection

@extends('layouts.admin')

@section('title', 'الوسائط')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-collection-play me-2" style="color:var(--primary);"></i> إدارة الوسائط</h1>
</div>

{{-- Upload Form --}}
<div class="admin-card card mb-4">
    <div class="card-header"><i class="bi bi-cloud-upload me-2"></i> رفع ملف جديد</div>
    <div class="card-body">
        <form action="{{ route('admin.media.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label">العنوان (اختياري)</label>
                    <input type="text" name="title_ar" class="form-control" placeholder="عنوان الملف">
                </div>
                <div class="col-md-5">
                    <label class="form-label">اختر الملف <span class="text-danger">*</span></label>
                    <input type="file" name="file" class="form-control" required accept="image/*,video/*,application/pdf">
                    <small class="text-muted">صورة، فيديو، أو PDF — الحد الأقصى 10MB</small>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100 rounded-3">
                        <i class="bi bi-upload me-1"></i> رفع الملف
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Media Grid --}}
<div class="admin-card card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <span><i class="bi bi-grid me-2"></i> الوسائط المرفوعة</span>
        <span class="badge bg-primary rounded-pill">{{ $items->total() }}</span>
    </div>
    <div class="card-body">
        @if($items->count())
        <div class="row g-3">
            @foreach($items as $item)
            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <div class="position-relative" style="height:130px; overflow:hidden; border-radius:0.5rem 0.5rem 0 0;">
                        @if($item->type === 'image')
                        <img src="{{ Storage::url($item->path) }}" class="w-100 h-100" style="object-fit:cover;">
                        @elseif($item->type === 'video')
                        <video class="w-100 h-100" style="object-fit:cover;" muted>
                            <source src="{{ Storage::url($item->path) }}">
                        </video>
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <i class="bi bi-play-circle-fill text-white" style="font-size:2rem; opacity:0.85;"></i>
                        </div>
                        @else
                        <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light">
                            <i class="bi bi-file-earmark-pdf text-danger" style="font-size:3rem;"></i>
                        </div>
                        @endif
                        <span class="badge position-absolute top-0 end-0 m-1 {{ $item->type === 'image' ? 'bg-primary' : ($item->type === 'video' ? 'bg-success' : 'bg-danger') }}">
                            {{ $item->type }}
                        </span>
                    </div>
                    <div class="card-body p-2">
                        <p class="small text-muted mb-2 text-truncate" title="{{ $item->title_ar }}">{{ $item->title_ar }}</p>
                        <div class="d-flex gap-1">
                            <a href="{{ Storage::url($item->path) }}" target="_blank" class="btn btn-sm btn-outline-secondary rounded-2 flex-fill">
                                <i class="bi bi-eye"></i>
                            </a>
                            <form action="{{ route('admin.media.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('حذف هذا الملف؟')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger rounded-2"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-4">{{ $items->links() }}</div>
        @else
        <div class="text-center py-5 text-muted">
            <i class="bi bi-images display-3 d-block mb-3 opacity-25"></i>
            <p>لا توجد وسائط مرفوعة بعد</p>
        </div>
        @endif
    </div>
</div>

@endsection

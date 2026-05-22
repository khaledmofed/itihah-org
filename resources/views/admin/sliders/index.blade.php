@extends('layouts.admin')

@section('title', 'مقاطع الفيديو الرئيسية')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-play-circle me-2" style="color:var(--primary);"></i> مقاطع الفيديو الرئيسية (الهيرو)</h1>
    <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary rounded-3">
        <i class="bi bi-plus-lg me-1"></i> إضافة فيديو
    </a>
</div>

<div class="alert alert-info rounded-3 mb-4" style="font-size:13px;">
    <i class="bi bi-info-circle me-1"></i>
    هذه المقاطع تظهر في الجزء اليساري من الهيرو في الصفحة الرئيسية.
    لكل سجل: رفع ملف فيديو أو رابط من <strong>YouTube / Instagram / Vimeo</strong> أو رابط ملف (.mp4). في الهيرو: الفيديو المباشر يُشغّل في المربع العلوي؛ روابط المنصات تُعرض داخل مشغّل مدمج (قد تفرض المنصة تشغيلاً بعد تفاعل المستخدم).
</div>

<div class="admin-card card">
    <div class="card-body p-0">
        @if(session('success'))
        <div class="alert alert-success m-3 rounded-3">{{ session('success') }}</div>
        @endif
        @if($sliders->count())
        <div class="table-responsive">
            <table class="table admin-table mb-0">
                <thead>
                    <tr>
                        <th width="70">صورة</th>
                        <th>التسمية (عربي)</th>
                        <th>العنوان (إنجليزي)</th>
                        <th>الفيديو</th>
                        <th>الترتيب</th>
                        <th>الحالة</th>
                        <th width="120">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sliders as $slider)
                    <tr>
                        <td>
                            @if($slider->image)
                            <img src="{{ Storage::url($slider->image) }}" class="rounded-2" style="width:60px;height:45px;object-fit:cover;">
                            @else
                            <div class="rounded-2 d-flex align-items-center justify-content-center bg-light" style="width:60px;height:45px;">
                                <i class="bi bi-image text-muted"></i>
                            </div>
                            @endif
                        </td>
                        <td><div class="fw-bold">{{ $slider->title_ar }}</div></td>
                        <td><div class="text-muted small" dir="ltr">{{ Str::limit($slider->title_en ?? '—', 55) }}</div></td>
                        <td>
                            @if($slider->video_path)
                            <span class="badge bg-primary-subtle text-primary border small"><i class="bi bi-upload me-1"></i>ملف مرفوع</span>
                            @elseif($slider->video_url)
                            <a href="{{ $slider->video_url }}" target="_blank" class="text-primary small" dir="ltr" style="word-break:break-all;">
                                <i class="bi bi-link-45deg me-1"></i>{{ Str::limit($slider->video_url, 40) }}
                            </a>
                            @else
                            <span class="text-muted small">—</span>
                            @endif
                        </td>
                        <td>{{ $slider->order ?? '—' }}</td>
                        <td>
                            @if($slider->is_active)
                            <span class="badge bg-success rounded-pill">مفعّل</span>
                            @else
                            <span class="badge bg-secondary rounded-pill">معطّل</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-sm btn-outline-primary rounded-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST"
                                    onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-2">
                                        <i class="bi bi-trash"></i>
                                    </button>
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
            <i class="bi bi-images display-3 d-block mb-3 opacity-25"></i>
            <p class="mb-3">لا توجد سلايدات بعد</p>
            <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary rounded-3">إضافة سلايد</a>
        </div>
        @endif
    </div>
</div>

@endsection

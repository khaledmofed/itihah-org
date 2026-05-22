@extends('layouts.admin')

@section('title', isset($slider->id) ? 'تعديل السلايد' : 'إضافة سلايد')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-images me-2" style="color:var(--primary);"></i>
        {{ isset($slider->id) ? 'تعديل السلايد' : 'إضافة سلايد جديد' }}
    </h1>
    <a href="{{ route('admin.sliders.index') }}" class="btn btn-outline-secondary rounded-3">
        <i class="bi bi-arrow-right me-1"></i> العودة
    </a>
</div>

<div class="admin-card card">
    <div class="card-body">
        <form action="{{ isset($slider->id) ? route('admin.sliders.update', $slider->id) : route('admin.sliders.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($slider->id)) @method('PUT') @endif

            @if($errors->any())
            <div class="alert alert-danger rounded-3 mb-4">
                <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
            @endif

            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label">العنوان (عربي) <span class="text-danger">*</span></label>
                    <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $slider->title_ar) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">العنوان (إنجليزي)</label>
                    <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $slider->title_en) }}" dir="ltr">
                </div>
                <div class="col-md-6">
                    <label class="form-label">العنوان الفرعي (عربي)</label>
                    <input type="text" name="subtitle_ar" class="form-control" value="{{ old('subtitle_ar', $slider->subtitle_ar) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">نص الزر</label>
                    <input type="text" name="button_text_ar" class="form-control" value="{{ old('button_text_ar', $slider->button_text_ar) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">رابط الزر</label>
                    <input type="text" name="button_url" class="form-control" value="{{ old('button_url', $slider->button_url) }}" dir="ltr">
                </div>
                <div class="col-md-3">
                    <label class="form-label">الترتيب</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $slider->order ?? 0) }}" min="0">
                </div>
                <div class="col-md-3">
                    <label class="form-label">الحالة</label>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ old('is_active', $slider->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">مفعّل</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">الصورة</label>
                    @if(isset($slider->image) && $slider->image)
                    <div class="mb-2">
                        <img src="{{ Storage::url($slider->image) }}" class="img-preview mb-2 d-block">
                        <small class="text-muted">الصورة الحالية — ارفع صورة جديدة للاستبدال</small>
                    </div>
                    @endif
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
                <div class="col-md-6">
                    <label class="form-label">رفع فيديو من الجهاز (اختياري)</label>
                    @if(!empty($slider->video_path))
                    <div class="mb-2 small text-muted">
                        <i class="bi bi-film me-1"></i> ملف مرفوع حالياً — ارفع ملفاً جديداً للاستبدال
                    </div>
                    @endif
                    <input type="file" name="video" class="form-control" accept="video/mp4,video/webm,video/quicktime,.mp4,.webm,.mov,.m4v,.mkv,.avi">
                    <small class="text-muted d-block mt-1">صيغ شائعة: MP4، WebM، MOV — حتى ~128 ميجابايت (يعتمد أيضاً على إعدادات PHP على السيرفر).</small>
                    @if(!empty($slider->video_path))
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="clear_video" id="clear_video" value="1">
                        <label class="form-check-label text-danger" for="clear_video">حذف ملف الفيديو المرفوع (والاعتماد على الرابط فقط إن وُجد)</label>
                    </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <label class="form-label">رابط فيديو خارجي (اختياري)</label>
                    <input type="text" name="video_url" class="form-control" value="{{ old('video_url', $slider->video_url) }}" dir="ltr" placeholder="https://...">
                    <small class="text-muted">يدعم رابط YouTube أو Instagram (منشور / Reel) أو Vimeo، أو رابط ملف مباشر (.mp4 …). الملف المرفوع له أولوية على الرابط.</small>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5 rounded-3">
                        <i class="bi bi-check-lg me-1"></i> {{ isset($slider->id) ? 'تحديث' : 'حفظ' }}
                    </button>
                    <a href="{{ route('admin.sliders.index') }}" class="btn btn-light px-4 rounded-3 ms-2">إلغاء</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

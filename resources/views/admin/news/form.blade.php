@extends('layouts.admin')

@section('title', isset($news->id) ? 'تعديل الخبر' : 'إضافة خبر')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-newspaper me-2" style="color:var(--primary);"></i>
        {{ isset($news->id) ? 'تعديل: ' . Str::limit($news->title_ar, 40) : 'إضافة خبر جديد' }}
    </h1>
    <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary rounded-3">
        <i class="bi bi-arrow-right me-1"></i> العودة
    </a>
</div>

<div class="admin-card card">
    <div class="card-body">
        <form action="{{ isset($news->id) ? route('admin.news.update', $news->id) : route('admin.news.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($news->id)) @method('PUT') @endif

            @if($errors->any())
            <div class="alert alert-danger rounded-3 mb-4">
                <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
            @endif

            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label">العنوان (عربي) <span class="text-danger">*</span></label>
                    <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $news->title_ar) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">العنوان (إنجليزي)</label>
                    <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $news->title_en) }}" dir="ltr">
                </div>
                <div class="col-12">
                    <label class="form-label">المقتطف (عربي)</label>
                    <textarea name="excerpt_ar" rows="2" class="form-control" placeholder="ملخص مختصر للخبر...">{{ old('excerpt_ar', $news->excerpt_ar) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">المحتوى (عربي) <span class="text-danger">*</span></label>
                    <textarea name="content_ar" rows="8" class="form-control" required>{{ old('content_ar', $news->content_ar) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">المحتوى (إنجليزي)</label>
                    <textarea name="content_en" rows="8" class="form-control" dir="ltr">{{ old('content_en', $news->content_en) }}</textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label">المؤلف</label>
                    <input type="text" name="author" class="form-control" value="{{ old('author', $news->author ?? auth('admin')->user()->name) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">تاريخ النشر</label>
                    <input type="datetime-local" name="published_at" class="form-control"
                        value="{{ old('published_at', $news->published_at?->format('Y-m-d\TH:i') ?? now()->format('Y-m-d\TH:i')) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">الحالة</label>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="is_published" id="is_published"
                            {{ old('is_published', $news->is_published ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">نشر الخبر</label>
                    </div>
                </div>
                <div class="col-md-8">
                    <label class="form-label">الصورة الرئيسية</label>
                    @if(isset($news->image) && $news->image)
                    <div class="mb-2"><img src="{{ Storage::url($news->image) }}" class="img-preview d-block mb-1"></div>
                    @endif
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5 rounded-3">
                        <i class="bi bi-check-lg me-1"></i> {{ isset($news->id) ? 'تحديث' : 'حفظ' }}
                    </button>
                    <a href="{{ route('admin.news.index') }}" class="btn btn-light px-4 rounded-3 ms-2">إلغاء</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

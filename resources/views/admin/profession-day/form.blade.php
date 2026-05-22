@extends('layouts.admin')

@section('title', isset($section->id) ? 'تعديل القسم' : 'إضافة قسم')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-calendar-star me-2" style="color:var(--primary);"></i>
        {{ isset($section->id) ? 'تعديل: ' . $section->title_ar : 'إضافة قسم يوم المهنة' }}
    </h1>
    <a href="{{ route('admin.profession-day.index') }}" class="btn btn-outline-secondary rounded-3">
        <i class="bi bi-arrow-right me-1"></i> العودة
    </a>
</div>

<div class="admin-card card">
    <div class="card-body">
        <form action="{{ isset($section->id) ? route('admin.profession-day.update', $section->id) : route('admin.profession-day.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($section->id)) @method('PUT') @endif

            @if($errors->any())
            <div class="alert alert-danger rounded-3 mb-4">
                <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
            @endif

            <div class="row g-4">
                <div class="col-md-4">
                    <label class="form-label">مفتاح القسم <span class="text-danger">*</span></label>
                    <input type="text" name="section_key" class="form-control" dir="ltr"
                        value="{{ old('section_key', $section->section_key) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">الترتيب</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $section->order ?? 0) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">الحالة</label>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                            {{ old('is_active', $section->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">مفعّل</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">العنوان (عربي) <span class="text-danger">*</span></label>
                    <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $section->title_ar) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">العنوان (إنجليزي)</label>
                    <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $section->title_en) }}" dir="ltr">
                </div>
                <div class="col-md-6">
                    <label class="form-label">المحتوى (عربي)</label>
                    <textarea name="content_ar" rows="6" class="form-control">{{ old('content_ar', $section->content_ar) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">المحتوى (إنجليزي)</label>
                    <textarea name="content_en" rows="6" class="form-control" dir="ltr">{{ old('content_en', $section->content_en) }}</textarea>
                </div>
                <div class="col-md-8">
                    <label class="form-label">الصورة</label>
                    @if(isset($section->image) && $section->image)
                    <div class="mb-2"><img src="{{ Storage::url($section->image) }}" class="img-preview d-block mb-1"></div>
                    @endif
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5 rounded-3">
                        <i class="bi bi-check-lg me-1"></i> {{ isset($section->id) ? 'تحديث' : 'حفظ' }}
                    </button>
                    <a href="{{ route('admin.profession-day.index') }}" class="btn btn-light px-4 rounded-3 ms-2">إلغاء</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

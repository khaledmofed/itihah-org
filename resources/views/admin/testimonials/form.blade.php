@extends('layouts.admin')

@section('title', isset($testimonial->id) ? 'تعديل الشهادة' : 'إضافة شهادة')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-chat-quote me-2" style="color:var(--primary);"></i>
        {{ isset($testimonial->id) ? 'تعديل: ' . $testimonial->name_ar : 'إضافة شهادة جديدة' }}
    </h1>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary rounded-3">
        <i class="bi bi-arrow-right me-1"></i> العودة
    </a>
</div>

<div class="admin-card card">
    <div class="card-body">
        <form action="{{ isset($testimonial->id) ? route('admin.testimonials.update', $testimonial->id) : route('admin.testimonials.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($testimonial->id)) @method('PUT') @endif

            @if($errors->any())
            <div class="alert alert-danger rounded-3 mb-4">
                <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
            @endif

            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label">الاسم (عربي) <span class="text-danger">*</span></label>
                    <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar', $testimonial->name_ar) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">الاسم (إنجليزي)</label>
                    <input type="text" name="name_en" class="form-control" dir="ltr" value="{{ old('name_en', $testimonial->name_en) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">الدور / المسمى الوظيفي</label>
                    <input type="text" name="role_ar" class="form-control" value="{{ old('role_ar', $testimonial->role_ar) }}" placeholder="مثال: مصففة شعر محترفة، دبي">
                </div>
                <div class="col-md-3">
                    <label class="form-label">التقييم (1-5)</label>
                    <select name="rating" class="form-select">
                        @for($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}" {{ old('rating', $testimonial->rating ?? 5) == $i ? 'selected' : '' }}>{{ $i }} نجوم</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">الترتيب</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}" min="0">
                </div>
                <div class="col-12">
                    <label class="form-label">نص الشهادة <span class="text-danger">*</span></label>
                    <textarea name="content_ar" rows="4" class="form-control" required>{{ old('content_ar', $testimonial->content_ar) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">الصورة الشخصية</label>
                    @if(isset($testimonial->image) && $testimonial->image)
                    <div class="mb-2">
                        <img src="{{ Storage::url($testimonial->image) }}" style="width:64px;height:64px;object-fit:cover;border-radius:50%;" class="d-block mb-1">
                    </div>
                    @endif
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
                <div class="col-md-6">
                    <label class="form-label">الحالة</label>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                            {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">مفعّل</label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5 rounded-3">
                        <i class="bi bi-check-lg me-1"></i> {{ isset($testimonial->id) ? 'تحديث' : 'حفظ' }}
                    </button>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-light px-4 rounded-3 ms-2">إلغاء</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

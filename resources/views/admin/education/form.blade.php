@extends('layouts.admin')

@section('title', isset($path->id) ? 'تعديل المسار' : 'إضافة مسار')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-mortarboard me-2" style="color:var(--primary);"></i>
        {{ isset($path->id) ? 'تعديل: ' . $path->title_ar : 'إضافة مسار تعليمي' }}
    </h1>
    <a href="{{ route('admin.education.index') }}" class="btn btn-outline-secondary rounded-3">
        <i class="bi bi-arrow-right me-1"></i> العودة
    </a>
</div>

<div class="admin-card card">
    <div class="card-body">
        <form action="{{ isset($path->id) ? route('admin.education.update', $path->id) : route('admin.education.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($path->id)) @method('PUT') @endif

            @if($errors->any())
            <div class="alert alert-danger rounded-3 mb-4">
                <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
            @endif

            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label">الاسم (عربي) <span class="text-danger">*</span></label>
                    <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $path->title_ar) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">الاسم (إنجليزي)</label>
                    <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $path->title_en) }}" dir="ltr">
                </div>
                <div class="col-md-4">
                    <label class="form-label">التصنيف <span class="text-danger">*</span></label>
                    <select name="category" class="form-select" required>
                        <option value="">اختر التصنيف</option>
                        @foreach(['taheel' => 'تأهيل', 'tatweer' => 'تطوير', 'certificates' => 'فئة الشهادات'] as $val => $label)
                        <option value="{{ $val }}" {{ old('category', $path->category) == $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">المستوى</label>
                    <input type="text" name="level" class="form-control" value="{{ old('level', $path->level) }}" placeholder="مبتدئ، متوسط، متقدم">
                </div>
                <div class="col-md-4">
                    <label class="form-label">المدة</label>
                    <input type="text" name="duration" class="form-control" value="{{ old('duration', $path->duration) }}" placeholder="3 أشهر، 6 أشهر...">
                </div>
                <div class="col-md-6">
                    <label class="form-label">الوصف (عربي)</label>
                    <textarea name="description_ar" rows="4" class="form-control">{{ old('description_ar', $path->description_ar) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">الوصف (إنجليزي)</label>
                    <textarea name="description_en" rows="4" class="form-control" dir="ltr">{{ old('description_en', $path->description_en) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">الأهداف (سطر لكل هدف)</label>
                    <textarea name="objectives" rows="4" class="form-control" placeholder="هدف أول&#10;هدف ثانٍ&#10;...">{{ old('objectives', isset($path->objectives) ? implode("\n", $path->objectives) : '') }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">المتطلبات (سطر لكل متطلب)</label>
                    <textarea name="requirements" rows="4" class="form-control" placeholder="متطلب أول&#10;متطلب ثانٍ&#10;...">{{ old('requirements', isset($path->requirements) ? implode("\n", $path->requirements) : '') }}</textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label">لون التصنيف</label>
                    <input type="color" name="color" class="form-control form-control-color" value="{{ old('color', $path->color ?? '#2166A9') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">الترتيب</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $path->order ?? 0) }}" min="0">
                </div>
                <div class="col-md-4">
                    <label class="form-label">الحالة</label>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                            {{ old('is_active', $path->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">مفعّل</label>
                    </div>
                </div>
                <div class="col-md-8">
                    <label class="form-label">الشعار / الصورة</label>
                    @if(isset($path->logo) && $path->logo)
                    <div class="mb-2"><img src="{{ Storage::url($path->logo) }}" class="img-preview d-block mb-1"></div>
                    @endif
                    <input type="file" name="logo" class="form-control" accept="image/*">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5 rounded-3">
                        <i class="bi bi-check-lg me-1"></i> {{ isset($path->id) ? 'تحديث' : 'حفظ' }}
                    </button>
                    <a href="{{ route('admin.education.index') }}" class="btn btn-light px-4 rounded-3 ms-2">إلغاء</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

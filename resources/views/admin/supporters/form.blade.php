@extends('layouts.admin')

@section('title', isset($supporter->id) ? 'تعديل الداعم' : 'إضافة داعم')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-building me-2" style="color:var(--primary);"></i>
        {{ isset($supporter->id) ? 'تعديل: ' . $supporter->name_ar : 'إضافة داعم جديد' }}
    </h1>
    <a href="{{ route('admin.supporters.index') }}" class="btn btn-outline-secondary rounded-3">
        <i class="bi bi-arrow-right me-1"></i> العودة
    </a>
</div>

<div class="admin-card card">
    <div class="card-body">
        <form action="{{ isset($supporter->id) ? route('admin.supporters.update', $supporter->id) : route('admin.supporters.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($supporter->id)) @method('PUT') @endif

            @if($errors->any())
            <div class="alert alert-danger rounded-3 mb-4">
                <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
            @endif

            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label">الاسم (عربي) <span class="text-danger">*</span></label>
                    <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar', $supporter->name_ar) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">الاسم (إنجليزي)</label>
                    <input type="text" name="name_en" class="form-control" value="{{ old('name_en', $supporter->name_en) }}" dir="ltr">
                </div>
                <div class="col-md-4">
                    <label class="form-label">نوع الداعم</label>
                    <select name="type" class="form-select">
                        <option value="">عام</option>
                        <option value="official" {{ old('type', $supporter->type) == 'official' ? 'selected' : '' }}>داعم رسمي</option>
                        <option value="sponsor" {{ old('type', $supporter->type) == 'sponsor' ? 'selected' : '' }}>راعٍ</option>
                        <option value="partner" {{ old('type', $supporter->type) == 'partner' ? 'selected' : '' }}>شريك</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">الترتيب</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $supporter->order ?? 0) }}" min="0">
                </div>
                <div class="col-md-4">
                    <label class="form-label">الحالة</label>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                            {{ old('is_active', $supporter->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">مفعّل</label>
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label">الوصف (عربي)</label>
                    <textarea name="description_ar" rows="3" class="form-control">{{ old('description_ar', $supporter->description_ar) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">رابط الموقع</label>
                    <input type="url" name="url" class="form-control" dir="ltr"
                        value="{{ old('url', $supporter->url) }}" placeholder="https://...">
                </div>
                <div class="col-md-6">
                    <label class="form-label">الشعار</label>
                    @if(isset($supporter->logo) && $supporter->logo)
                    <div class="mb-2"><img src="{{ Storage::url($supporter->logo) }}" class="img-preview d-block mb-1"></div>
                    @endif
                    <input type="file" name="logo" class="form-control" accept="image/*">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5 rounded-3">
                        <i class="bi bi-check-lg me-1"></i> {{ isset($supporter->id) ? 'تحديث' : 'حفظ' }}
                    </button>
                    <a href="{{ route('admin.supporters.index') }}" class="btn btn-light px-4 rounded-3 ms-2">إلغاء</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
